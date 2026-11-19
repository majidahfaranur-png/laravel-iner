<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Kata sandi yang saat ini digunakan oleh factory.
     */
    protected static ?string $password;

    /**
     * Tentukan nilai bawaan model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Buat data pengguna acak yang konsisten untuk pengujian dan seeder.
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Tandai bahwa alamat email model belum diverifikasi.
     */
    public function unverified(): static
    {
        // Factory state ini menyiapkan akun yang belum menyelesaikan verifikasi email.
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
