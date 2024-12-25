import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/js/login.js',
                'resources/js/register.js',
                'resources/js/deskripsi.js',
                'resources/js/mapKey.js',
                'resources/js/text.js',
                'resources/js/text2.js',
            ],
            refresh: true,
            
        }),
    ],
});

