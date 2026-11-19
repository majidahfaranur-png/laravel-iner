<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <!-- Gunakan teks properti value, atau isi slot jika label dibuat oleh pemanggil. -->
    <label class="block text-sm font-medium text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
