import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/js/app.jsx' ],
            refresh: true,
        }),
        react(), 
    ],
    resolve: {
        alias: {
            '@': '/public/js',
        },
    },
    build: {
        outDir: 'public/build',
        manifest: true,
    },
    server: { 
        hmr: {
            host: 'localhost',
        },
    },
});