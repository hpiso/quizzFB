<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Quizz;

class QuizzController extends BaseController
{
    public function index(){

        $entities = Quizz::all();

        return view('admin.quizz.index', [
            'entities' => $entities
        ]);
    }
}
