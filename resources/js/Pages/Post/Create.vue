<script setup>
import Layout from '@/Layouts/App.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    content: '',
});

// Inertia mengirim post dan mengelola status proses serta kesalahan validasi.
function storePost() {
    form.post('/posts');
}
</script>

<template>
    <Layout>
        <Head title="Tambah Data" />

        <section class="mx-auto" style="max-width: 820px">
            <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-secondary small fw-semibold mb-1">Kelola post</p>
                    <h1 class="h3 mb-1">Tambah data</h1>
                    <p class="text-secondary mb-0">Isi judul dan konten untuk membuat post baru.</p>
                </div>
                <Link href="/posts" class="btn btn-outline-secondary">Kembali ke daftar</Link>
            </div>

            <!-- Kesalahan validasi ditampilkan tepat di bawah kolom terkait. -->
            <form class="card border-0 shadow-sm" @submit.prevent="storePost">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label for="post-title" class="form-label fw-semibold">Judul</label>
                        <input
                            id="post-title"
                            v-model="form.title"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.title }"
                            maxlength="255"
                            required
                            autofocus
                            placeholder="Masukkan judul post"
                        />
                        <div v-if="form.errors.title" class="invalid-feedback">{{ form.errors.title }}</div>
                    </div>

                    <div class="mb-1">
                        <label for="post-content" class="form-label fw-semibold">Konten</label>
                        <textarea
                            id="post-content"
                            v-model="form.content"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.content }"
                            rows="8"
                            required
                            placeholder="Tulis konten post"
                        ></textarea>
                        <div v-if="form.errors.content" class="invalid-feedback">{{ form.errors.content }}</div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 px-4 pb-4 d-flex flex-wrap justify-content-end gap-2">
                    <Link href="/posts" class="btn btn-light">Batal</Link>
                    <button type="button" class="btn btn-outline-secondary" :disabled="form.processing" @click="form.reset()">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        {{ form.processing ? 'Menyimpan...' : 'Simpan post' }}
                    </button>
                </div>
            </form>
        </section>
    </Layout>
</template>
