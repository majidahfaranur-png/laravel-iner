<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pengirim Email Bawaan
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan pengirim bawaan untuk semua email, kecuali pengirim
    | lain ditentukan secara khusus saat mengirim pesan. Pengirim tambahan
    | dapat dikonfigurasikan di dalam array "mailers".
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Pengirim Email
    |--------------------------------------------------------------------------
    |
    | Konfigurasikan semua pengirim email yang digunakan aplikasi beserta
    | pengaturannya. Beberapa contoh tersedia dan dapat ditambah sesuai
    | kebutuhan aplikasi.
    |
    | Laravel mendukung berbagai driver "transport" untuk mengirim email.
    | Tentukan driver yang digunakan setiap pengirim di bawah ini, atau
    | tambahkan pengirim lain jika diperlukan.
    |
    | Yang didukung: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Alamat Pengirim Global
    |--------------------------------------------------------------------------
    |
    | Semua email aplikasi dapat menggunakan alamat pengirim yang sama.
    | Tentukan nama dan alamat yang akan digunakan secara global di sini.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];
