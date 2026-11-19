<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nama Aplikasi
    |--------------------------------------------------------------------------
    |
    | Nilai ini adalah nama aplikasi yang akan digunakan framework untuk
    | menampilkan nama pada notifikasi atau elemen antarmuka lainnya.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Lingkungan Aplikasi
    |--------------------------------------------------------------------------
    |
    | Nilai ini menentukan "lingkungan" tempat aplikasi berjalan dan dapat
    | memengaruhi konfigurasi layanan yang digunakan. Atur di file ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Mode Debug Aplikasi
    |--------------------------------------------------------------------------
    |
    | Saat mode debug aktif, pesan kesalahan terperinci beserta stack trace
    | ditampilkan. Jika dinonaktifkan, aplikasi menampilkan halaman kesalahan
    | umum.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL Aplikasi
    |--------------------------------------------------------------------------
    |
    | URL ini digunakan oleh konsol untuk membuat alamat dengan benar saat
    | memakai perintah Artisan. Atur ke alamat utama aplikasi agar dapat
    | digunakan oleh perintah Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona Waktu Aplikasi
    |--------------------------------------------------------------------------
    |
    | Tentukan zona waktu bawaan aplikasi yang digunakan oleh fungsi tanggal
    | dan waktu PHP. Nilai bawaan "UTC" sesuai untuk sebagian besar kebutuhan.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Bahasa Aplikasi
    |--------------------------------------------------------------------------
    |
    | Bahasa aplikasi menentukan bahasa bawaan yang digunakan oleh metode
    | penerjemahan/lokalisasi Laravel. Pilih bahasa yang memiliki teks
    | terjemahan di aplikasi.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Kunci Enkripsi
    |--------------------------------------------------------------------------
    |
    | Kunci ini digunakan oleh layanan enkripsi Laravel dan harus berupa
    | string acak sepanjang 32 karakter agar nilai terenkripsi tetap aman.
    | Atur kunci sebelum aplikasi diterapkan.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver Mode Pemeliharaan
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan driver untuk mengatur status "mode pemeliharaan"
    | Laravel. Driver "cache" memungkinkan status tersebut dikendalikan dari
    | beberapa mesin.
    |
    | Driver yang didukung: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
