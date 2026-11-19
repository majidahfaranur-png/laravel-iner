<script setup>
import Layout from '@/Layouts/App.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <!-- Ringkasan awal setelah pengguna berhasil masuk. -->
    <Layout>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h1 class="h3 mb-2">Dashboard</h1>
                <p class="mb-0 text-secondary">You're logged in!</p>
            </div>
        </div>
    </Layout>
</template>
