<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 13/01/2016
 * Time: 14:43
 */

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
    }

    public function show()
    {

    }
}