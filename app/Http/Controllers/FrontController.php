<?php
namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\Score;
use App\Models\User;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizzRepository;
use DateTime;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    protected $quizzRepository;
    protected $questionRepository;
    protected $answerRepository;

    public function __construct(QuizzRepository $quizzRepository,
                                QuestionRepository $questionRepository,
                                AnswerRepository $answerRepository)
    {
        $this->quizzRepository = $quizzRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $quizz = $this->quizzRepository->getActif();

        $startingDate = new DateTime($quizz->starting_at);
        $startingDate = $startingDate->format('d/m/Y');
        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d/m/Y');
        return view('front.index', [
            'quizz' => $quizz,
            'startingDate' => $startingDate,
            'endingDate' => $endingDate
        ]);
    }

    public function process(Request $request)
    {
        $quizz = $this->quizzRepository->getActif();

//        if(Request::ajax()) {
//            $data = Input::all();
//            dd($data);
//        }

        if (null !== $request->input('question') && null !== $request->input('res') && null !== $request->input('temps'))
        {
            $res = $request->input('res');
            $question = $this->questionRepository->getQuestion($request->input('question'));
            $answer = $this->answerRepository->getTrue($question->id);
            if ($res == $answer->id)
            {
                dd('true');
                //USER +1rep +temps
            } else
            {
                dd('false');
                //USER +temps
            }
        } else
        {

        }

        return view('front.process', [
            'quizz' => $quizz,
            'question' => $question,
            'res' => $res
        ]);
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

    public function quizz()
    {
        $tabQuest = array();
        $quizz = $this->quizzRepository->getActif();

        foreach ($quizz->questions as $quest)
        {
            array_push($tabQuest, $quest);
        }
        shuffle($tabQuest);
        while (count($tabQuest) > $quizz->max_question)
        {
            array_pop($tabQuest);
        }

        return view('front.quizz', [
            'quizz' => $quizz,
            'tabQuest' => $tabQuest
        ]);
    }

    public function questionQuizz(Request $request)
    {

        $quizz = $this->quizzRepository->getActif();

        if (null !== $request->input('questionId'))
        {
            $question = $this->questionRepository->getQuestion($request->input('questionId'));
        }
        if (null !== $request->input('numQuest'))
        {
            $numQuest = $request->input('numQuest');
        } else
        {
            $numQuest = 0;
        }

        return view('front.questionquizz', [
            'question' => $question,
            'numQuest' => $numQuest,
            'nbQuest' => $quizz->max_question
        ]);
    }

    public function classement()
    {
        $quizz = $this->quizzRepository->getActif();
        //IL FAUDRAIT CACHER LA VUE OU LES DONNEES AVANT LA DATE DE FIN DU QUIZZ
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

    /**
     * Page de tests
     */
    public function tests()
    {
        foreach (User::first()->scores as $score) {
            dump($score->quizz);
        };
    }
}

