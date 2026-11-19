<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Layanan Pihak Ketiga
    |--------------------------------------------------------------------------
    |
    | Berkas ini menyimpan konfigurasi kredensial layanan pihak ketiga seperti
    | Mailgun, Postmark, AWS, dan lainnya. Berkas ini menjadi lokasi standar
    | agar paket dapat menemukan kredensial layanan tersebut.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Akun demo hanya dibuat oleh seeder jika email dan kata sandi diisi.
    'demo_user' => [
        'name' => env('DEMO_USER_NAME'),
        'email' => env('DEMO_USER_EMAIL'),
        'password' => env('DEMO_USER_PASSWORD'),
    ],

];
