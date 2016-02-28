<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
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

        $actifQuizz = Quizz::where('actif', 1)->first();

        if (!$actifQuizz) {
            $goodAnswerNbr = 0;
            $badAnswerNbr = 0;
        } else {
            $goodAnswerNbr = Score::where('quizz_id', $actifQuizz->id)
                ->where('correct', true)
                ->count();

            $badAnswerNbr = Score::where('quizz_id', $actifQuizz->id)
                ->where('correct', false)
                ->count();
        }

        return view('admin.dashboard.index', [
            'quizzs' => $quizzs,
            'questions' => $questions,
            'themes' => $themes,
            'users' => $users,
            'actifQuizz' => $actifQuizz,
            'goodAnswerNbr' => $goodAnswerNbr,
            'badAnswerNbr' => $badAnswerNbr
        ]);
    }
}
