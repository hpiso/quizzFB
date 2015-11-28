<?php

namespace App\Http\Controllers;

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

        return view('admin.quizz.index', [
            'entities' => $entities
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

    public function destroy($id)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->delete();

        return redirect('admin/quizz')->with('status', 'Quizz supprimé');
    }
}
