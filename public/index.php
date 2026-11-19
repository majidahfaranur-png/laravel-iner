<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Periksa apakah aplikasi sedang berada dalam mode pemeliharaan.
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Muat autoloader Composer untuk menemukan kelas aplikasi dan dependensi.
require __DIR__.'/../vendor/autoload.php';

// Inisialisasi Laravel, tangkap permintaan HTTP, lalu kirim ke aplikasi.
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
