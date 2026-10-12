import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        // Servidor do Vite (npm run dev). Porta separada do Apache (8080) e do artisan (8000).
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
    },
});
