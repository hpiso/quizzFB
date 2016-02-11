<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
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

    public function question()
    {
        $quizz = $this->quizzRepository->getActif();

        $answerExist = Score::where('user_id', $this::FB_ID)
            ->where('quizz_id', $quizz->id)
            ->exists();

        if (!$answerExist) {
            $question = $quizz->questions->random(1);
            $this->scoreRepository->storeUnansweredQuestion($quizz, $question);
        } else {
            $unansweredQuestion = $this->scoreRepository->getUnansweredQuestion($quizz);
            $question = $unansweredQuestion->question;
        }

        $answeredQuestionNbr = $this->scoreRepository->getAnsweredQuestionNbr($quizz);

        if ($answeredQuestionNbr < $quizz->max_question) {
            return view('front.question', [
                'question' => $question,
            ]);
        }

        return redirect('/result');
    }

    public function action(Request $request)
    {
        $quizz = $this->quizzRepository->getActif();
        $answer = Answer::findOrFail($request->get('answer'));

        $answeredQuestionNbr = $this->scoreRepository->getAnsweredQuestionNbr($quizz);

        if ($answeredQuestionNbr < $quizz->max_question) {

            $unansweredQuestion = $this->scoreRepository->getUnansweredQuestion($quizz);
            $this->scoreRepository->checkAndStore($answer, $unansweredQuestion);

            $answeredQuestions = $this->scoreRepository->getAnsweredQuestions($quizz);
            foreach ($quizz->questions as $key => $question) {
                foreach ($answeredQuestions as $answeredQuestion) {
                    if ($question->id == $answeredQuestion->question->id) {
                        $quizz->questions->forget($key);
                    }
                }
            }

            if ($quizz->questions->isEmpty()) {
                return redirect('/result');
            } else {
                $question = $quizz->questions->random(1);
                $this->scoreRepository->storeUnansweredQuestion($quizz, $question);
            }

            return redirect('/question');
        }
        return redirect('/result');
    }

    public function result()
    {
        return view('front.result');
    }
}

