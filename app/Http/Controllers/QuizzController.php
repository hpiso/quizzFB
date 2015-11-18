<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class QuizzController extends BaseController
{
    public function index(){
        return view('admin.quizz.index');
    }
}
