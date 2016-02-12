<?php

return [
//    'driver' => env('SESSION_DRIVER', 'database'),
    'driver' => env('SESSION_DRIVER', 'database'),
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => env('SESSION_DATABASE_CONNECTION','pgsql'),
    'table' => env('SESSION_DATABASE_TABLE', 'sessions'),
    'lottery' => [2, 100],
    'cookie' => 'quizz_session',
    'path' => '/',
    'domain' => env('SESSION_DOMAIN','esgiquizzcreator.herokuapp.com'),
    'secure' => false,
];
