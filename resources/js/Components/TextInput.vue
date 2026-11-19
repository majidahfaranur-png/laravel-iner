<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

// Fokus otomatis dipasang setelah elemen input tersedia di DOM.
onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

// Ekspos fungsi fokus supaya formulir induk dapat mengarahkan pengguna ke input tertentu.
defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <!-- Input terkontrol yang meneruskan perubahan ke v-model komponen induk. -->
    <input
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        v-model="model"
        ref="input"
    />
</template>
