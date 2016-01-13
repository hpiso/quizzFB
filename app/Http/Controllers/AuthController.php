<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 13/01/2016
 * Time: 14:43
 */

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        dd(Socialite::driver('facebook')->user());
    }

}