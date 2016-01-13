<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Repositories\QuizzRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;
use DateTime;

class FrontController extends Controller {

    protected $quizzRepository;
    protected $questionRepository;
    protected $answerRepository;

    public function __construct(QuizzRepository $quizzRepository, QuestionRepository $questionRepository, AnswerRepository $answerRepository)
    {
        $this->quizzRepository = $quizzRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index() {
        $quizz = $this->quizzRepository->getActif();

        $startingDate = new DateTime($quizz->starting_at);
        $startingDate = $startingDate->format('d-m-Y') ;
        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d-m-Y') ;
        return view('front.index', [
            'quizz'         => $quizz,
            'startingDate' => $startingDate,
            'endingDate' => $endingDate
        ]);
    }

    public function result(Request $request) {
        $quizz = $this->quizzRepository->getActif();


        if (null !== $request->input('question') && null !== $request->input('res')) {
            $res = $request->input('res');
            $question = $this->questionRepository->getQuestion($request->input('question'));
            $answer = $this->answerRepository->getTrue($question->id);

            if($res==$answer->id){
                //USER +1rep
            }
        } else {

        }

        return view('front.result', [
            'quizz' => $quizz,
            'question' => $question,
            'res'   =>  $res
        ]);
    }

    public function quizz() {
        $quizz = $this->quizzRepository->getActif();

        return view('front.quizz', [
            'quizz' => $quizz
        ]);
    }

    public function questionQuizz(Request $request) {

        $quizz = $this->quizzRepository->getActif();

        if (null !== $request->input('numQuest')) {
            $numQuest = $request->input('numQuest');
            $question = $quizz->questions[$numQuest];
        } else {
            $numQuest = 0;
            $question = $quizz->questions->first();
        }

        return view('front.questionquizz', [
            'quizz' => $quizz,
            'question' => $question,
            'numQuest' => $numQuest
        ]);
    }
}

