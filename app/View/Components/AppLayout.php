<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Komponen Blade yang memilih view kerangka utama aplikasi.
 */
class AppLayout extends Component
{
    /**
     * Buat instance komponen baru.
     */
    public function __construct()
    {
        //
    }

    /**
     * Ambil view atau konten yang ditampilkan oleh komponen.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-layout');
    }
}
