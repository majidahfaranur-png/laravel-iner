<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <!-- Pesan validasi hanya dirender ketika server mengirimkan kesalahan. -->
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
