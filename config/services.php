<?php

return [
    'facebook' => [
        /**
         * Le code public de l'application
         */
        'client_id' => env('FACEBOOK_APP_ID','1685507368351576'),
        /**
         * Le code secret de l'application
         */
        'client_secret' => env('FACEBOOK_APP_SECRET','76494686368fe261129849f7b70e526f'),

        'default_graph_version' => '2.5',

        'redirect' => route('callback'),
    ]
];