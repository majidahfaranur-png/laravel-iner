<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver Sesi Bawaan
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan driver sesi bawaan untuk permintaan yang masuk.
    | Laravel mendukung berbagai pilihan penyimpanan data sesi. Penyimpanan
    | basis data merupakan pilihan bawaan yang sesuai.
    |
    | Yang didukung: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Masa Berlaku Sesi
    |--------------------------------------------------------------------------
    |
    | Tentukan jumlah menit sesi boleh tidak aktif sebelum kedaluwarsa. Agar
    | sesi langsung berakhir saat browser ditutup, aktifkan opsi konfigurasi
    | expire_on_close.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Enkripsi Sesi
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan apakah seluruh data sesi dienkripsi sebelum disimpan.
    | Laravel menjalankan enkripsi secara otomatis sehingga sesi tetap dapat
    | digunakan seperti biasa.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Lokasi Berkas Sesi
    |--------------------------------------------------------------------------
    |
    | Saat menggunakan driver sesi "file", data sesi disimpan sebagai berkas
    | di disk. Lokasi penyimpanan bawaan ditentukan di sini dan dapat diganti
    | sesuai kebutuhan.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Koneksi Basis Data Sesi
    |--------------------------------------------------------------------------
    |
    | Saat menggunakan driver sesi "database" atau "redis", tentukan koneksi
    | yang digunakan untuk mengelola sesi. Koneksi tersebut harus tersedia
    | pada konfigurasi basis data aplikasi.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabel Basis Data Sesi
    |--------------------------------------------------------------------------
    |
    | Saat menggunakan driver sesi "database", tentukan tabel untuk menyimpan
    | sesi. Nilai bawaan sudah disediakan dan dapat diganti dengan tabel lain.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Penyimpanan Cache Sesi
    |--------------------------------------------------------------------------
    |
    | Jika backend sesi menggunakan cache, tentukan penyimpanan cache untuk
    | menyimpan data sesi di antara permintaan. Nilainya harus sesuai dengan
    | salah satu penyimpanan cache yang telah dikonfigurasikan.
    |
    | Berlaku untuk: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Peluang Pembersihan Sesi
    |--------------------------------------------------------------------------
    |
    | Beberapa driver sesi perlu membersihkan data sesi lama secara berkala.
    | Nilai berikut menentukan peluang pembersihan pada setiap permintaan.
    | Secara bawaan, peluangnya adalah 2 dari 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nama Cookie Sesi
    |--------------------------------------------------------------------------
    |
    | Ubah nama cookie sesi yang dibuat framework di sini. Biasanya nilai ini
    | tidak perlu diubah karena penggantian nama tidak memberikan peningkatan
    | keamanan yang berarti.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Jalur Cookie Sesi
    |--------------------------------------------------------------------------
    |
    | Jalur cookie menentukan lokasi aplikasi tempat cookie dapat digunakan.
    | Biasanya jalur ini adalah akar aplikasi, tetapi dapat diubah jika perlu.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Domain Cookie Sesi
    |--------------------------------------------------------------------------
    |
    | Nilai ini menentukan domain dan subdomain yang dapat menggunakan cookie
    | sesi. Secara bawaan, cookie tersedia untuk domain utama dan seluruh
    | subdomain. Biasanya nilai ini tidak perlu diubah.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Khusus HTTPS
    |--------------------------------------------------------------------------
    |
    | Jika opsi ini diaktifkan, cookie sesi hanya dikirim ke server melalui
    | koneksi HTTPS. Dengan demikian, cookie tidak dikirim melalui koneksi
    | yang tidak aman.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Akses HTTP Saja
    |--------------------------------------------------------------------------
    |
    | Jika opsi ini diaktifkan, JavaScript tidak dapat membaca nilai cookie
    | dan cookie hanya dapat diakses melalui protokol HTTP. Sebaiknya opsi ini
    | tidak dinonaktifkan.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookie Same-Site
    |--------------------------------------------------------------------------
    |
    | Opsi ini mengatur perilaku cookie pada permintaan lintas situs dan dapat
    | membantu mengurangi serangan CSRF. Nilai bawaan "lax" mengizinkan
    | permintaan lintas situs yang aman.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Yang didukung: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Terpartisi
    |--------------------------------------------------------------------------
    |
    | Jika opsi ini diaktifkan, cookie dikaitkan dengan situs tingkat teratas
    | pada konteks lintas situs. Browser menerima cookie terpartisi jika
    | atribut "secure" aktif dan Same-Site diatur ke "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
