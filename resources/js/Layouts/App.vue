<script setup>
import { Link, router } from '@inertiajs/vue3'

// Jalankan proses keluar dari akun.
function logout() {
    // Logout dikirim sebagai permintaan Inertia agar sesi Laravel diakhiri di server.
    router.post('/logout')
}
</script>

<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container d-flex justify-content-between align-items-center">
        <Link class="navbar-brand fw-bold" href="/posts">LARAVEL + VUE + INERTIA.JS</Link>

        <div class="d-flex align-items-center">
          <!-- Tampilkan identitas dan aksi keluar hanya untuk sesi terautentikasi. -->
          <template v-if="$page.props.auth?.user">
            <span class="text-white me-3">
              Halo, <strong>{{ $page.props.auth.user.name }}</strong>
            </span>
            <button @click="logout" class="btn btn-outline-danger btn-sm text-white">
              LOGOUT
            </button>
          </template>

          <!-- Pengunjung anonim diarahkan ke halaman masuk atau registrasi. -->
          <template v-else>
            <Link href="/login" class="btn btn-outline-light btn-sm me-2">LOGIN</Link>
            <Link href="/register" class="btn btn-primary btn-sm">REGISTER</Link>
          </template>
        </div>
      </div>
    </nav>

    <main class="container my-4">
      <nav v-if="$page.props.auth?.user" class="nav nav-pills mb-3" aria-label="Main navigation">
        <Link
          href="/dashboard"
          class="nav-link"
          :class="{ active: $page.url === '/dashboard' }"
        >Dashboard</Link>
        <Link
          href="/posts"
          class="nav-link"
          :class="{ active: $page.url.startsWith('/posts') }"
        >Posts</Link>
      </nav>
      <slot />
    </main>
  </div>
</template>