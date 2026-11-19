<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Isi basis data aplikasi dengan data awal.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Buat akun demo hanya jika email dan kata sandi disediakan melalui konfigurasi.
        $demoUser = config('services.demo_user');

        if (blank($demoUser['email'] ?? null) || blank($demoUser['password'] ?? null)) {
            return;
        }

        User::updateOrCreate(
            ['email' => $demoUser['email']],
            [
                'name' => filled($demoUser['name'] ?? null) ? $demoUser['name'] : 'Demo User',
                'password' => Hash::make($demoUser['password']),
            ]
        );
    }
}
