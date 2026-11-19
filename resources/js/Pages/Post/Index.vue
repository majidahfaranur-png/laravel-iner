<script setup>
import Layout from '@/Layouts/App.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    posts: Array,
});

// Minta konfirmasi sebelum menghapus karena aksi ini tidak dapat dibatalkan.
function deletePost(post) {
    if (!window.confirm(`Hapus post "${post.title}"? Tindakan ini tidak dapat dibatalkan.`)) {
        return;
    }

    router.delete(`/posts/${post.id}`, { preserveScroll: true });
}
</script>

<template>
    <Layout>
        <Head title="Daftar Post" />

        <section>
            <div v-if="$page.props.flash?.message" class="alert alert-success" role="status">
                {{ $page.props.flash.message }}
            </div>

            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-secondary small fw-semibold mb-1">Kelola konten</p>
                    <h1 class="h3 mb-1">Daftar post</h1>
                    <p class="text-secondary mb-0">{{ posts.length }} post tersimpan</p>
                </div>
                <Link href="/posts/create" class="btn btn-primary">Tambah data</Link>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="ps-4">Judul</th>
                                <th scope="col">Konten</th>
                                <th scope="col" class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="posts.length === 0">
                                <td colspan="3" class="py-5 text-center text-secondary">Belum ada post.</td>
                            </tr>
                            <tr v-for="post in posts" :key="post.id">
                                <td class="ps-4 fw-semibold">{{ post.title }}</td>
                                <td class="text-secondary" style="max-width: 560px; white-space: pre-wrap">{{ post.content }}</td>
                                <td class="text-end pe-4 text-nowrap">
                                    <Link :href="`/posts/${post.id}/edit`" class="btn btn-sm btn-outline-primary me-2">Edit</Link>
                                    <button type="button" class="btn btn-sm btn-outline-danger" @click="deletePost(post)">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </Layout>
</template>