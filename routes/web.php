<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Pengguna yang sudah masuk diarahkan ke konten; pengunjung melihat halaman awal.
    if (Auth::check()) {
        return redirect()->route('posts.index');
    }

    return Inertia::render('SkyWelcome');
});

// Semua halaman akun dan CRUD post di bawah ini hanya tersedia setelah login.
Route::middleware(['auth'])->group(function () {

    // Halaman tujuan setelah autentikasi berhasil.
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute resource menyediakan aksi daftar, buat, simpan, ubah, perbarui, dan hapus post.
    Route::resource('posts', PostController::class);
});

// Rute autentikasi (masuk, daftar, verifikasi email, reset kata sandi, dan keluar).
require __DIR__.'/auth.php';