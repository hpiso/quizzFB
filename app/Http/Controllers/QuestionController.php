<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class QuestionController extends BaseController
{

    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {

        $entities = Question::all();
        $quizzs = Quizz::all();

        return view('admin.question.index', [
            'entities' => $entities,
            'quizzs' => $quizzs
        ]);
    }

    public function create()
    {
        return view('admin.question.create');
    }

    public function filter(Request $request)
    {
        $quizzs = Quizz::all();

        $inputs = $request->all();
        $entities = $this->questionRepository->filter($inputs);
        $username = $request->old('username');

        return view('admin.question.index', [
            'entities' => $entities,
            'quizzs' => $quizzs
        ]);
    }
}
