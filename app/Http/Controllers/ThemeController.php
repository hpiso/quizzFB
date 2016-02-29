<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Repositories\ThemeRepository;

class ThemeController extends BaseController
{

    protected $themeRepository;


    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    public function index(){

        $entities = Theme::all();

        return view('admin.theme.index', [
            'entities' => $entities
        ]);
    }

    public function create()
    {
        return view('admin.theme.create');
    }

    public function store(Request $request)
    {
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'decription'     => 'required',
            'color_nav'      => 'required',
            'color_elements' => 'required',
            'logo'           => 'required'
        ]);

        $inputs = $request->all();
        $this->themeRepository->store($inputs);

        return redirect('admin/theme',302,[],true)->with('status', 'Thème ajouté');
    }

    public function edit($id)
    {

        $theme = Theme::findOrFail($id);

        return view('admin.theme.edit', [
            'theme' => $theme
        ]);
    }

    public function update(Request $request, $id)
    {
        //Php validation
        $this->validate($request, [
            'label'          => 'required',
            'decription'     => 'required',
            'color_nav'      => 'required',
            'color_elements' => 'required',
            'logo'           => 'required'
        ]);

        $inputs = $request->all();
        $this->themeRepository->update($id, $inputs);

        return redirect('admin/theme',302,[],true)->with('status', 'Thème modifié');
    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();

        return redirect('admin/theme',302,[],true)->with('status', 'Thème supprimé');
    }
}
