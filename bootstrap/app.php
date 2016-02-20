<?php

require_once __DIR__ . '/../vendor/autoload.php';

//Dotenv::load(__DIR__ . '/../');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    //Illuminate\Cookie\Middleware\EncryptCookies::class,
    Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    Illuminate\Session\Middleware\StartSession::class,
    Illuminate\View\Middleware\ShareErrorsFromSession::class,
//    App\Http\Middleware\HttpsProtocol::class,
//    Laravel\Lumen\Http\Middleware\VerifyCsrfToken::class,
]);

$app->routeMiddleware([
    'secure' => 'App\Http\Middleware\HttpsProtocol',
    'admin' => 'App\Http\Middleware\CheckAdmin',
    'loggedin' => 'App\Http\Middleware\CheckLoggedIn'
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
//$app->register(App\Providers\EventServiceProvider::class);
//$app->register(App\Providers\AuthServiceProvider::class);
$app->register(\Laravel\Socialite\SocialiteServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
//| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->group(['namespace' => 'App\Http\Controllers'], function ($app)
{
    require __DIR__ . '/../app/Http/routes.php';
});

/*
|--------------------------------------------------------------------------
| Load The Application Configurations Files
|--------------------------------------------------------------------------
|
*/

config(['cache' => [
    'default' => env('CACHE_DRIVER', 'database'),
    'stores' => [
        'array' => [
            'driver' => 'array',
        ],
        'database' => [
            'driver' => 'database',
            'table' => env('CACHE_DATABASE_TABLE', 'cache'),
            'connection' => env('CACHE_CONNECTION', 'pgsql'),
        ],

    ],
    'prefix' => 'lumen'
]]);

config(['services' => [
    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID', '1685507368351576'),
        'client_secret' => env('FACEBOOK_APP_SECRET', '76494686368fe261129849f7b70e526f'),
        'default_graph_version' => '2.5',
        'redirect' => route('callback'),
    ]
]]);

config(['session' => [
    'driver' => 'database',
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),
    'encrypt' => false,
//    'files' => storage_path('framework/sessions'),
    'connection' => env('SESSION_DATABASE_CONNECTION', 'pgsql'),
    'table' => env('SESSION_DATABASE_TABLE', 'sessions'),
    'lottery' => [2, 100],
    'cookie' => 'quizz_session',
    'path' => '/',
    'domain' => env('SESSION_DOMAIN', 'esgiquizzcreator.herokuapp.com'),
    'secure' => true,
]]);

return $app;