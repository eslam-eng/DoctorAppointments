<?php

return [
    'mode' => env('URWAY_MODE', 'test'),
    'auth' => [
        'terminal_id' => env('URWAY_TERMINAL_ID'),
        'password' => env('URWAY_PASSWORD'),
        'merchant_key' => env('URWAY_MERCHANT_KEY'),
        'urway_endpoint' => env('URWAY_ENDPOINT'),
        'redirect_url' => env('URWAY_REDIRECT_URL'),
    ],
];
