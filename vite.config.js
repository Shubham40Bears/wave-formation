import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/tcw/scss/style.scss',
                'resources/js/app.js',
                'resources/tcw/js/script.js',
            ],
            refresh: true,
            outputDir: 'public',
        }),
    ],
});
