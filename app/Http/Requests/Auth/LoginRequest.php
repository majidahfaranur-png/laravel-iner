<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan mengirim permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // Samakan format email agar spasi/kapital tidak menghalangi proses login.
        $this->merge([
            'email' => Str::lower(preg_replace('/\s+/', '', (string) $this->input('email', ''))),
        ]);
    }

    /**
     * Ambil aturan validasi yang berlaku untuk permintaan ini.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Coba autentikasi menggunakan kredensial pada permintaan.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Catat percobaan gagal untuk membatasi serangan tebak kata sandi.
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Email atau password salah. Periksa kembali keduanya.',
            ]);
        }

        // Hapus hitungan gagal setelah login berhasil.
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Pastikan permintaan login belum melewati batas percobaan.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Buat kunci pembatasan percobaan untuk permintaan ini.
     */
    public function throttleKey(): string
    {
        // Gabungkan email dan alamat IP supaya batas percobaan berlaku per pengguna/perangkat.
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
