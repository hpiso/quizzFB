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

    /**
     * Redirige vers la page de connexion de Facebook
     * TODO Ajouter des scopes pour récupérer d'autres données utilisateur
     *
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['user_location','email'])->redirect();
    }

    /**
     * Gère la requête qui revient de Facebook après l'authentification de l'utilisateur
     *
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function handleProviderCallback()
    {
        /** Je cherche l'utilisateur renvoyé par Facebook dans ma propre base de donées
         * S'il existe -> je le renvois
         * S'il n'existe pas -> on l'ajoute
         */
        $user = Socialite::driver('facebook')->fields(['first_name', 'last_name', 'email', 'gender', 'verified', 'id', 'age_range', 'location'])->user();
        $user = $this->findOrStore($user);
        // Je fais confiance à Facebook et j'authentifie l'utilisateur renvoyé / créé
        if ($this->login($user) && $user->isAdmin())
        {
            return redirect($this->redirectTo);
        }
        return redirect($this->redirectAfterLogout);
    }

    /**
     * Fausse fonction de connexion de l'utilisateur
     * Il n'es pas possible d'utiliser les fonctions par défaut de Lumen car l'utilisateur n'a pas de mot de passe
     * On considère que si Facebook renvoit des informations, alors il est correctement identifié .
     * On fait confiance à Facebook qui s'est occupé de cette partie et on connectre notre utilisateur
     *
     * @param $user
     * @return mixed
     */
    protected function login(User $user)
    {
        // L'utilisateur est ajouté à la session courante
        Session::put(Auth::getName(), $user->id);
        // On set l'utilisateur courant dans l'application
        Auth::setUser($user);

        // Renvoie true si l'utilisateur est bien connecté
        return (Auth::check());
    }

    /**
     * Méthode de déconnection à la main de l'utilisateur
     * Il est retiré de la session et redirigé vers l'accueil
     *
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
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

        $city = isset($user['location']) ? explode(',', $user['location']['name'])[0] : null;
        $country = isset($user['location']) ? explode(',', $user['location']['name'])[1] : null;

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
                'admin' => false,
                'age' => $user['age_range']['min'],
                'city' => $city,
                'country' => trim($country)
            ]);
        } else
        {
            // Utilisateur trouvé en base, on met à jour ses informations
            $userBase->update([
                'token' => $user->token,
                'email' => $user->getEmail(),
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'avatar' => $user->getAvatar(),
                'avatar_original' => $user->avatar_original,
                'gender' => $user['gender'],
                'age' => $user['age_range']['min'],
                'city' => $city,
                'country' => trim($country)
            ]);
        }
        $userBase->save();
        return $userBase;
    }
}