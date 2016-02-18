<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Score;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizzRepository;
use App\Repositories\ScoreRepository;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    protected $quizzRepository;
    protected $scoreRepository;
    protected $answerRepository;
    protected $questionRepository;

    public function __construct(
        QuizzRepository $quizzRepository,
        ScoreRepository $scoreRepository,
        QuestionRepository $questionRepository,
        AnswerRepository $answerRepository
    )
    {
        $this->quizzRepository = $quizzRepository;
        $this->scoreRepository = $scoreRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $quizz = $this->quizzRepository->getActif();

        return view('front.index', [
            'quizz' => $quizz
        ]);
    }

//    public function tests() {
//        $quizz = 2;
//        dd(Auth::user()->scores->contains(function($key,$item){
//            return $item->quizz_id == $quizz ? $item : false;
//        }));
//    }

    public function question()
    {
        $quizz = $this->quizzRepository->getActif();

        $answerExist = Score::where('user_id', Auth::user()->id)
            ->where('quizz_id', $quizz->id)
            ->exists();

        if (!$answerExist)
        {
            $question = $quizz->questions->random(1);
            $this->scoreRepository->storeUnansweredQuestion($quizz, $question);
        } else
        {
            $unansweredQuestion = $this->scoreRepository->getUnansweredQuestion($quizz);
            if (!$unansweredQuestion)
            {
                return redirect('/result');
            }
            $question = $unansweredQuestion->question;
        }

        $answeredQuestionNbr = $this->scoreRepository->getAnsweredQuestionNbr($quizz);

        if ($answeredQuestionNbr < $quizz->max_question)
        {
            return view('front.question', [
                'question' => $question,
                'numQuest' => $answeredQuestionNbr,
                'nbQuest' => $quizz->max_question
            ]);
        }

        return redirect()->secure('/result');
    }

    public function action(Request $request)
    {
        $quizz = $this->quizzRepository->getActif();
        $answer = Answer::find($request->get('answer'));

        if (!$answer)
        {
            return redirect('/question')->with('status', 'Vous devez cochez au moins une réponse');
        }

        $answeredQuestionNbr = $this->scoreRepository->getAnsweredQuestionNbr($quizz);

        if ($answeredQuestionNbr < $quizz->max_question)
        {

            $unansweredQuestion = $this->scoreRepository->getUnansweredQuestion($quizz);
            $this->scoreRepository->checkAndStore($answer, $unansweredQuestion);

            $answeredQuestions = $this->scoreRepository->getAnsweredQuestions($quizz);
            foreach ($quizz->questions as $key => $question)
            {
                foreach ($answeredQuestions as $answeredQuestion)
                {
                    if ($question->id == $answeredQuestion->question->id)
                    {
                        $quizz->questions->forget($key);
                    }
                }
            }

            if ($quizz->questions->isEmpty())
            {
                return redirect('/result');
            } else
            {
                $question = $quizz->questions->random(1);
                $this->scoreRepository->storeUnansweredQuestion($quizz, $question);
            }

            return redirect('/question');
        }
        return redirect('/result');
    }

    public function result()
    {
        $quizz = $this->quizzRepository->getActif();

        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d/m/Y');
        $startClassement = false;
        if (new DateTime() > new DateTime($quizz->ending_at))
        {
            $startClassement = true;
        }

        return view('front.result', [
            'endingDate' => $endingDate,
            'startClassement' => $startClassement
        ]);
    }

    public function classement()
    {

        $quizz = $this->quizzRepository->getActif();
        // TODO : IL FAUDRAIT CACHER LA VUE OU LES DONNEES AVANT LA DATE DE FIN DU QUIZZ
        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d/m/Y');
        $startClassement = false;
        if (new DateTime() > new DateTime($quizz->ending_at))
        {
            $startClassement = true;
        }

        return view('front.classement', [
            'startClassement' => $startClassement
        ]);
    }
}

