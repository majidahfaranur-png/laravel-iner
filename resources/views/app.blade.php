<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Metadata dokumen dan judul yang dapat diperbarui melalui Inertia. -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Muat Bootstrap 5 CSS dari CDN. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ziggy menyediakan helper route di Vue; Vite memuat aset aplikasi/halaman. -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
  </head>
  <body class="font-sans antialiased bg-light">
    <!-- Inertia mengganti isi aplikasi di elemen ini saat halaman dirender. -->
    @inertia

    <!-- Muat Bootstrap 5 JavaScript dari CDN. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>