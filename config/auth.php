<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pengaturan Bawaan Autentikasi
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan "guard" autentikasi dan "broker" reset kata sandi
    | bawaan aplikasi. Nilai ini dapat diubah sesuai kebutuhan dan sesuai
    | digunakan sebagai pengaturan awal.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guard Autentikasi
    |--------------------------------------------------------------------------
    |
    | Tentukan setiap guard autentikasi yang digunakan aplikasi. Konfigurasi
    | bawaan menggunakan penyimpanan sesi dan penyedia pengguna Eloquent.
    |
    | Setiap guard memiliki penyedia pengguna yang menentukan cara mengambil
    | data pengguna dari basis data atau sistem penyimpanan aplikasi. Biasanya,
    | aplikasi menggunakan Eloquent.
    |
    | Yang didukung: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Penyedia Pengguna
    |--------------------------------------------------------------------------
    |
    | Setiap guard autentikasi memiliki penyedia pengguna yang menentukan cara
    | mengambil data pengguna dari basis data atau sistem penyimpanan aplikasi.
    | Biasanya, aplikasi menggunakan Eloquent.
    |
    | Jika aplikasi memiliki beberapa tabel atau model pengguna, konfigurasikan
    | beberapa penyedia untuk mewakilinya. Penyedia ini dapat ditetapkan ke
    | guard autentikasi tambahan.
    |
    | Yang didukung: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Reset Kata Sandi
    |--------------------------------------------------------------------------
    |
    | Opsi ini mengatur perilaku fitur reset kata sandi Laravel, termasuk tabel
    | penyimpanan token dan penyedia pengguna untuk mengambil akun.
    |
    | Masa berlaku menentukan berapa menit token reset dapat digunakan. Token
    | berumur pendek mengurangi waktu yang tersedia untuk menebaknya. Ubah
    | nilai ini sesuai kebutuhan.
    |
    | Batas waktu menentukan berapa detik pengguna harus menunggu sebelum
    | membuat token reset berikutnya. Pengaturan ini mencegah pembuatan token
    | reset secara berulang dalam jumlah besar.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Batas Waktu Konfirmasi Kata Sandi
    |--------------------------------------------------------------------------
    |
    | Tentukan jumlah detik sebelum masa konfirmasi kata sandi berakhir dan
    | pengguna diminta memasukkan ulang kata sandi. Secara bawaan, batas waktu
    | ini berlangsung selama tiga jam.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
