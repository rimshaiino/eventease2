import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
// import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/flatpickr.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],

        }),
    ],
});
