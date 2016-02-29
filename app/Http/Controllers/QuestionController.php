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
            'quizzs'   => $quizzs
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
        $items = Quizz::all();

        return view('admin.question.create',[
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'answerChecked'  => 'required',
        ]);

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
            'quizzs'   => $quizzs,
            'filter'   => $inputs['quizz'],
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect('admin/question',302,[],true)->with('status', 'Question supprimée');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $items = Quizz::all();

        $quizzSelectedArray = [];
        foreach ($question->quizzs as $quizz){
            $quizzSelectedArray[] = $quizz->id;
        }

        $quizzSelected = json_encode($quizzSelectedArray);

        return view('admin.question.edit', [
            'question' => $question,
            'items'    => $items,
            'quizzSelected'    => $quizzSelected
        ]);
    }

    public function update(Request $request, $id)
    {
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'answerChecked'  => 'required',
        ]);

        $inputs = $request->all();
        $this->questionRepository->update($id, $inputs);

        return redirect('admin/question',302,[],true)->with('status', 'Question modifiée');
    }
}
