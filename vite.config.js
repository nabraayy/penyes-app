import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        react(), 
        laravel([
           'resource/js/app.jsx'
        ]),
       
    ],
    
});