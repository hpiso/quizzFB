<?php

return [
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
    'prefix' => 'lumen',
];
