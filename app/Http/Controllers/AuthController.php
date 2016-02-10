<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 13/01/2016
 * Time: 14:43
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

//use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Chemin de redirection après la connexion
     *
     * @var string
     */
    protected $redirectTo = '/admin/quizz';

    /**
     * Chemin pour se connecter
     *
     * @var string
     */
    protected $loginPath = '/login';

    /**
     * Chemin de redirection après la déconnexion
     *
     * @var string
     */
    protected $redirectAfterLogout = '/';

    /**
     * @var Socialite
     */
    protected $socialite;

    /**
     * @var string
     */
    protected $redirectPath = '/admin';

    /**
     * AuthController constructor.
     * @param Socialite $socialite
     */
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
        // Je cherche l'utilisateur renvoyé par Facebook dans ma propre base de donées
        // S'il existe -> je le renvois
        // S'il n'existe pas -> on l'ajoute
        $user = Socialite::driver('facebook')->user();
        $user = $this->findOrStore($user);
        // Je fais confiance à Facebook et j'authentifie l'utilisateur renvoyé / créé
        if ($this->login($user) && $user->isAdmin())
        {
            return redirect($this->redirectTo);
        }
        return redirect($this->redirectAfterLogout);
    }

    protected function login($user)
    {
        Session::put(Auth::getName(), $user->id);
        Auth::setUser($user);

        return (Auth::check());
    }

    public function logout()
    {
        Session::forget(Auth::getName());
        return redirect($this->redirectAfterLogout);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public
    function findOrStore(\Laravel\Socialite\Two\User $user)
    {
        $userBase = User::where('id', $user->getId())->first();
        if ($userBase == null)
        {
            // L'utilisateur n'existe pas en base, on l'ajoute
            $userBase = new User([
                'id' => $user->getId(),
                'token' => $user->token,
                'email' => $user->getEmail(),
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'avatar' => $user->getAvatar(),
                'avatar_original' => $user->avatar_original,
                'gender' => $user['gender'],
                'admin' => false
            ]);
        } else
        {
            // Utilisateur trouvé en base, on met à jour son token
            $userBase->update(['token' => $user->token]);
        }
        $userBase->save();
        return $userBase;
    }
}