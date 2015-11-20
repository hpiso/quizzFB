<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class QuestionController extends BaseController
{
    public function index(){
        return view('admin.question.index');
    }
}
