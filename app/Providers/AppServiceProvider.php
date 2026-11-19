<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Daftarkan layanan aplikasi.
     */
    public function register(): void
    {
        //
    }

    /**
     * Inisialisasi layanan aplikasi.
     */
    public function boot(): void
    {
        // Mulai memuat aset halaman lebih awal, maksimal tiga permintaan bersamaan.
        Vite::prefetch(concurrency: 3);
    }
}
