<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nama Koneksi Antrean Bawaan
    |--------------------------------------------------------------------------
    |
    | Antrean Laravel mendukung berbagai backend melalui satu API terpadu.
    | Setiap backend dapat digunakan dengan sintaks yang sama. Koneksi antrean
    | bawaan ditentukan di bawah ini.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Koneksi Antrean
    |--------------------------------------------------------------------------
    |
    | Konfigurasikan opsi koneksi untuk setiap backend antrean yang digunakan
    | aplikasi. Contoh tersedia untuk setiap backend yang didukung Laravel,
    | dan backend lain dapat ditambahkan sesuai kebutuhan.
    |
    | Driver: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Pengelompokan Job
    |--------------------------------------------------------------------------
    |
    | Opsi berikut menentukan basis data dan tabel untuk menyimpan informasi
    | pengelompokan job. Nilainya dapat diubah ke koneksi dan tabel basis data
    | yang telah didefinisikan oleh aplikasi.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Job Antrean yang Gagal
    |--------------------------------------------------------------------------
    |
    | Opsi ini mengatur pencatatan job yang gagal, termasuk cara dan lokasi
    | penyimpanannya. Laravel mendukung penyimpanan job gagal di berkas biasa
    | atau di basis data.
    |
    | Driver yang didukung: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
