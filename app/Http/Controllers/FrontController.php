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
use DateTime;

class FrontController extends Controller {

    const FB_ID = 999;

    protected $quizzRepository;
    protected $questionRepository;
    protected $answerRepository;

    public function __construct(QuizzRepository $quizzRepository, QuestionRepository $questionRepository, AnswerRepository $answerRepository)
    {
        $this->quizzRepository = $quizzRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $quizz = $this->quizzRepository->getActif();

        $startingDate = new DateTime($quizz->starting_at);
        $startingDate = $startingDate->format('d-m-Y');
        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d-m-Y');

        return view('front.index', [
            'quizz' => $quizz,
        ]);
    }

    public function quizzFirst()
    {
        $quizz = $this->quizzRepository->getActif();

        //Calcule combien de question répondu par user et par quizz
        $scoreNumber = Score::where('fb_id', $this::FB_ID)
            ->where('quizz_id', $quizz->id)
            ->count();

        //Si le nombre de question répondu est inférieur au nombre max de question par quizz
        if ($scoreNumber < $quizz->max_question) {
            $question = $quizz->questions->first();

            return view('front.quizz', [
                'question' => $question,
            ]);
        } else {
            return redirect('/result');
        }
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

