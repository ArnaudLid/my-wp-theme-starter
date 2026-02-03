import { defineConfig } from 'vite';
import { resolve } from 'path';
import fs from 'fs';

// Fonction pour nettoyer le dossier dist
const cleanDistFolder = () => {
    return {
        name: 'clean-dist',
        buildStart() {
            const distPath = resolve(__dirname, 'assets/dist');
            if (fs.existsSync(distPath)) {
                fs.rmSync(distPath, { recursive: true, force: true });
            }
        }
    };
};

export default defineConfig(({ command }) => {
    const isDev = command === 'serve';

    return {
        base: isDev ? '/' : './',

        build: {
            outDir: 'assets/dist',
            emptyOutDir: true,
            manifest: true,
            rollupOptions: {
                input: {
                    main: resolve(__dirname, 'assets/src/js/main.js'),
                    style: resolve(__dirname, 'assets/src/scss/main.scss'),
                },
                output: {
                    entryFileNames: 'js/[name].[hash].js',
                    chunkFileNames: 'js/[name].[hash].js',
                    assetFileNames: (assetInfo) => {
                        const ext = assetInfo.name.split('.').pop();
                        if (ext === 'css') {
                            return 'css/[name].[hash].css';
                        }
                        return 'assets/[name].[hash].[ext]';
                    }
                }
            },
            sourcemap: isDev,
            minify: !isDev,
        },

        server: {
            host: 'localhost',
            port: 3000,
            strictPort: true,
            cors: true,
            hmr: {
                host: 'localhost',
                port: 3000,
            },
            watch: {
                usePolling: true,
            }
        },

        css: {
            devSourcemap: true,
            preprocessorOptions: {
                scss: {
                    additionalData: `@import "./assets/src/scss/abstracts/_variables.scss";`
                }
            }
        },

        plugins: [cleanDistFolder()],

        resolve: {
            alias: {
                '@': resolve(__dirname, 'assets/src'),
                '@js': resolve(__dirname, 'assets/src/js'),
                '@scss': resolve(__dirname, 'assets/src/scss'),
            }
        }
    };
});
