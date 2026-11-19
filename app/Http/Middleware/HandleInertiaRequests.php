<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    // Kerangka Blade utama yang menjadi tempat aplikasi Vue/Inertia dirender.
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // Data autentikasi tersedia pada semua halaman Inertia.
            'auth' => [
                'user' => $request->user(),
            ],
            // Callback mengambil pesan sesi hanya saat prop ini benar-benar dibaca.
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
        ]);
    }
}