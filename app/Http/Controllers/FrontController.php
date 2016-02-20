<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Score;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizzRepository;
use App\Repositories\ScoreRepository;
use DateTime;
use Carbon\Carbon;
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
        $answeredQuestionNbr = 0;

        if(Auth::check())
        {
            $answeredQuestionNbr = $this->scoreRepository->getAnsweredQuestionNbr($quizz);
        }

        $already = true;
        if ($answeredQuestionNbr < $quizz->max_question) {
            $already = false;
        }

        return view('front.index', [
            'quizz'         => $quizz,
            'already'       => $already
        ]);
    }

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
        $score = $this->scoreRepository->scoreResult($quizz);

        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d/m/Y');
        $timeFirstQuestion = $this->scoreRepository->getAnsweredQuestions($quizz)->first()->created_at;
        $timeLastQuestion  = $this->scoreRepository->getAnsweredQuestions($quizz)->last()->updated_at;

        Carbon::setLocale('fr');
        $time = $timeLastQuestion->diffForHumans($timeFirstQuestion, true);

        $endingDate = Carbon::parse($quizz->ending_at);
        $endingDate->hour = 23;
        $endingDate->minute = 59;
        $endingDate->second = 59;

        $startClassement = false;
        if (Carbon::now()->gt($endingDate)) {
            $startClassement = true;
        }

        return view('front.result', [
            'startClassement' => $startClassement,
            'score'           => $score,
            'time'            => $time,
            'quizz'           => $quizz
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

