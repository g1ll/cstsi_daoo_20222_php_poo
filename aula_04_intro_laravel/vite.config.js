import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/show-prod.css',
                'resources/css/show-prod-green.css',
                'resources/css/table.css'
            ],
            refresh: true,
        }),
    ],
});
