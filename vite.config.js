import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    // Chemins relatifs pour WordPress
    base: './',

    // Configuration du build
    build: {
        outDir: 'assets/dist',
        emptyOutDir: true,

        // Points d'entrée
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'assets/src/js/main.js'),
                style: resolve(__dirname, 'assets/src/scss/main.scss'),
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.css')) {
                        return 'css/[name].css';
                    }
                    return 'assets/[name].[ext]';
                }
            }
        },

        // Source maps pour le debug
        sourcemap: true,

        // Pas de minification (optionnel, décommentez si vous voulez minifier)
        // minify: 'terser',
    },

    // Configuration CSS/SCSS
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
            },
        },
        devSourcemap: true,
    },

    // Alias pour imports simplifiés
    resolve: {
        alias: {
            '@': resolve(__dirname, 'assets/src'),
            '@js': resolve(__dirname, 'assets/src/js'),
            '@scss': resolve(__dirname, 'assets/src/scss'),
        },
    },
});
