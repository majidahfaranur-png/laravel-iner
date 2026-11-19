<script setup>
import Layout from '@/Layouts/App.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    post: Object,
});

const form = useForm({
    title: props.post.title,
    content: props.post.content,
});

// Isi awal berasal dari post terpilih; PUT meminta Laravel menyimpan perubahannya.
function updatePost() {
    form.put(`/posts/${props.post.id}`);
}
</script>

<template>
    <Layout>
        <Head :title="`Edit: ${post.title}`" />

        <section class="mx-auto" style="max-width: 820px">
            <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-secondary small fw-semibold mb-1">Kelola post</p>
                    <h1 class="h3 mb-1">Edit post</h1>
                    <p class="text-secondary mb-0">Perbarui judul atau konten, lalu simpan perubahan.</p>
                </div>
                <Link href="/posts" class="btn btn-outline-secondary">Kembali ke daftar</Link>
            </div>

            <form class="card border-0 shadow-sm" @submit.prevent="updatePost">
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
                        ></textarea>
                        <div v-if="form.errors.content" class="invalid-feedback">{{ form.errors.content }}</div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 px-4 pb-4 d-flex flex-wrap justify-content-end gap-2">
                    <Link href="/posts" class="btn btn-light">Batal</Link>
                    <button type="button" class="btn btn-outline-secondary" :disabled="form.processing" @click="form.reset()">
                        Kembalikan perubahan
                    </button>
                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        {{ form.processing ? 'Menyimpan...' : 'Simpan perubahan' }}
                    </button>
                </div>
            </form>
        </section>
    </Layout>
</template>
