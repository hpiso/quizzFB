<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Score;
use App\Repositories\QuizzRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;
use App\Repositories\ScoreRepository;

class FrontController extends Controller {

    const FB_ID = 999;

    protected $quizzRepository;
    protected $questionRepository;
    protected $answerRepository;
    protected $scoreRepository;

    public function __construct(
        QuizzRepository $quizzRepository,
        QuestionRepository $questionRepository,
        AnswerRepository $answerRepository,
        ScoreRepository $scoreRepository
    )
    {
        $this->quizzRepository = $quizzRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->scoreRepository = $scoreRepository;
    }

    public function index()
    {
        $quizz = $this->quizzRepository->getActif();

        return view('front.index', [
            'quizz' => $quizz,
        ]);
    }

    public function quizzFirst()
    {
        $quizz = $this->quizzRepository->getActif();

        //Calcule combien de question répondu par user et par quizz
        $answerExist = Score::where('fb_id', $this::FB_ID)
            ->where('quizz_id', $quizz->id)
            ->exists();

        if ($answerExist) {
            $score = Score::where('fb_id', $this::FB_ID)
                ->where('already_answer', false)
                ->first();
            $question = $score->question;
        } else {
            $question = $quizz->questions->random(1);

            $this->scoreRepository->storeUnansweredQuestion($quizz, $question);
        }

        return view('front.quizz', [
            'question' => $question,
        ]);
    }

    public function quizz()
    {
        $quizz = $this->quizzRepository->getActif();

        //Calcule combien de question répondu par user et par quizz
        $scoreNumber = Score::where('fb_id', $this::FB_ID)
            ->where('quizz_id', $quizz->id)
            ->count();

        //Si le nombre de question répondu est inférieur au nombre max de question par quizz
        if ($scoreNumber < $quizz->max_question) {

            $questionAlreadyAnswers = Score::where('fb_id', $this::FB_ID)
                ->where('quizz_id', $quizz->id)
                ->get();

            //Ne pas prendre en compte les questions déja effectuées
            foreach ($quizz->questions as $key => $question) {
                foreach ($questionAlreadyAnswers as $questionAlreadyAnswer) {
                    if ($question->id == $questionAlreadyAnswer->question->id) {
                        $quizz->questions->forget($key);
                    }
                }
            }

            //Selectionner une question aléatoire parmis les questions restantes
            $question = $quizz->questions->random(1);

            return view('front.quizz', [
                'question' => $question,
            ]);

        } else {
            return redirect('/result');
        }
    }

    public function action(Request $request)
    {

        $quizz = $this->quizzRepository->getActif();

        $answer = Answer::findOrFail($request->get('answer'));
        $question = $answer->question;

        //Calcule combien de question répondu par user et par quizz
        $scoreNumber = Score::where('fb_id', $this::FB_ID)
            ->where('quizz_id', $quizz->id)
            ->count();

        //Si le nombre de question répondu est inférieur au nombre max de question par quizz
        if ($scoreNumber < $quizz->max_question) {

            //On insert les données dans score
            $this->quizzRepository->checkAndStore($quizz, $answer, $question);

            return redirect('/quizz');

        } else {
            return redirect('/result');
        }
    }
}

