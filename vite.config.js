import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        // Laravel mengelola entry point aset dan memuat ulang browser saat kode berubah.
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        // Kompilasi sintaks Single File Component (.vue) menjadi JavaScript browser.
        vue({
            template: {
                // Biarkan URL aset absolut tetap utuh saat template Vue diproses.
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
