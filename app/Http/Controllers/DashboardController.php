<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Quizz;
use App\Models\Theme;

class DashboardController extends BaseController
{

    public function index()
    {
        $quizzs = Quizz::all();
        $questions = Question::all();
        $themes = Theme::all();
        $users = User::all();

        return view('admin.dashboard.index', [
            'quizzs' => $quizzs,
            'questions' => $questions,
            'themes' => $themes,
            'users' => $users
        ]);
    }
}
