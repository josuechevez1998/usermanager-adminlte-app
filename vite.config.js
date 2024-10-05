import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: [
                'resources/views/**/*.blade.php',
                'app/Http/Livewire/**/*.php',
                'config/adminlte.php',
                'routes/**/*.php',
                'resources/js/**/*.js',
                'resources/css/**/*.css',
                'resources/vendor/adminlte/*.blade.php',
            ],
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
    server:{
        watch:{
            usePolling: true,
        }
    }
});
