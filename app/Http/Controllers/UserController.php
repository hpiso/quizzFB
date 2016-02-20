<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 13/01/2016
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\User;

//use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.user.index', ['users' => User::all(), 'quizzs' => Quizz::all()]);
    }

    public function export()
    {
        $separator = ';';
        $file = '"ID"' . $separator .
            '"Prenom"' . $separator .
            '"Nom"' . $separator .
            '"Genre"' . $separator .
            '"Inscription"' . $separator .
            '"Age"' . $separator .
            '"Ville"' . $separator .
            '"Pays"' . $separator .
            '"Scores"' . "\r\n";

        foreach (User::all() as $user)
        {
            $file .= '"' . $user->id . '"' . $separator .
                '"' . $user->first_name . '"' . $separator .
                '"' . $user->last_name . '"' . $separator .
                '"' . $user->gender . '"' . $separator .
                '"' . $user->created_at . '"' . $separator .
                '"' . $user->age . '"' . $separator .
                '"' . $user->city . '"' . $separator .
                '"' . $user->country . '"' . $separator .
                '"';

            foreach ($user->scores as $score)
            {
                $file .= $score->quizz->label . ':' . $score->score . '-';
            }
            $file .= "\"\r\n";
        }
        return response($file, 200, ['Content-Type' => 'text/csv; charset=utf-8']);
    }
}