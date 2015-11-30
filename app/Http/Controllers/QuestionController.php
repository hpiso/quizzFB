<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use App\Models\Theme;
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

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('admin.question.show',[
            'question' => $question
        ]);
    }

    public function create()
    {
        $items = Theme::all(['id', 'label']);

        return view('admin.question.create',[
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->questionRepository->store($inputs);

        return redirect('admin/question');
    }

    public function filter(Request $request)
    {
        $quizzs = Quizz::all();

        $inputs = $request->all();
        $entities = $this->questionRepository->filter($inputs);

        return view('admin.question.index', [
            'entities' => $entities,
            'quizzs' => $quizzs
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect('admin/question')->with('status', 'Question supprimée');
    }
}
