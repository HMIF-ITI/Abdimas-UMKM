<?php

return [
    'midtrans' => [
        'merchant_id'    => env('MIDTRANS_MERCHANT_ID', 'your-merchant-id'),
        'client_key'     => env('MIDTRANS_CLIENT_KEY', 'your-client-key'),
        'server_key'     => env('MIDTRANS_SERVER_KEY', 'your-server-key'),
        'is_production'  => env('MIDTRANS_IS_PRODUCTION', false), // false for sandbox mode
        'is_sanitized'   => env('MIDTRANS_IS_SANITIZED', true),
        'is_3ds'         => env('MIDTRANS_IS_3DS', true), // use 3DS for secure transaction
    ]
];