<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repositories\QuizzRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Quizz;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

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
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'decription'     => 'required',
            'max_question'   => 'required|integer',
            'starting_at'    => 'required|date',
            'ending_at'      => 'required|date',
            'id_theme'       => 'required'
        ]);

        $inputs = $request->all();
        $this->quizzRepository->store($inputs);

        return redirect('admin/quizz',302,[],true);
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

    public function update(Request $request, $id)
    {
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'decription'     => 'required',
            'max_question'   => 'required|integer',
            'starting_at'    => 'required|date',
            'ending_at'      => 'required|date',
            'id_theme'       => 'required'
        ]);

        $inputs = $request->all();
        $this->quizzRepository->update($id, $inputs);

        return redirect('admin/quizz',302,[],true)->with('status', 'Quizz modifié');
    }

    public function destroy($id)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->delete();

        return redirect('admin/quizz',302,[],true)->with('status', 'Quizz supprimé');
    }

    public function show($id)
    {
        $quizz = Quizz::findOrFail($id);

        $questions = $quizz->questions()->paginate(10);

        return view('admin.quizz.show',[
            'questions' => $questions
        ]);
    }

    public function updateState(Request $request)
    {
        $inputs = $request->all();

        $quizz = Quizz::findOrFail($inputs['quizzId']);



        if ($quizz->questions->count() < $quizz->max_question) {
            return redirect('admin/quizz',302,[],true)->with(
                'error-status',
                'Il doit y avoir au moins '.$quizz->max_question.' questions appartenant
                à ce quizz pour l\'activer ('.$quizz->questions->count().' actuellement).
                Vous pouver ajouter des questions dans la rubrique "Question"');
        } elseif ($inputs['actif'] && $this->quizzRepository->getActif()) {
            return redirect('admin/quizz',302,[],true)->with(
                'error-status',
                'Un seul quizz peut être actif');
        } else {
            $this->quizzRepository->updateState($inputs, $quizz);
        }

        if ($inputs['actif']) {
            return redirect('admin/quizz',302,[],true)->with('status', 'Le quizz a été activé');
        } else {
            return redirect('admin/quizz',302,[],true)->with('status', 'Le quizz a été désactivé');
        }

    }
}
