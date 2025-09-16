<?php
return [
    'debug' => false,

    'Security' => [
        'salt' => 'votre_cle_secrete_aleatoire_tres_longue',
    ],

    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'prhsyxwm_lord',
            'password' => 'M@nolo1234/*',
            'database' => 'prhsyxwm_ulcolien',
            'url' => env('DATABASE_URL', null),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
        ],
    ],
];
