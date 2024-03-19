import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vuePlugin from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vuePlugin(),
        laravel({
            input: [
                // stylesheet
                'resources/scss/stylesheet.scss',

                // front app js
                'resources/js/front/app.js',

                // admin app js
                'resources/js/admin/app.js',
            ],
            refresh: true,
        }),
    ],
});
