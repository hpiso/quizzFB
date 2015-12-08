<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repositories\QuizzRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Quizz;
use App\Models\Theme;

class QuizzController extends BaseController
{

    protected $quizzRepository;

    public function __construct(QuizzRepository $quizzRepository)
    {
        $this->quizzRepository = $quizzRepository;
    }

    public function index()
    {
        $entities = Quizz::all();
        $entitiesQuestion = Question::all();
        $entitiesTheme = Theme::all();

        return view('admin.quizz.index', [
            'entities' => $entities,
            'entitiesQuestion' => $entitiesQuestion,
            'entitiesTheme' => $entitiesTheme
        ]);
    }

    public function create()
    {
        $items = Theme::all(['id', 'label']);

        return view('admin.quizz.create', [
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->quizzRepository->store($inputs);

        return redirect('admin/quizz');
    }

    public function edit($id)
    {

        $quizz = Quizz::findOrFail($id);
        $items = Theme::all(['id', 'label']);

        return view('admin.quizz.edit', [
            'quizz' => $quizz,
            'items' => $items
        ]);
    }

    public function update($id)
    {

        //
    }

    public function destroy($id)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->delete();

        return redirect('admin/quizz')->with('status', 'Quizz supprimé');
    }
}
