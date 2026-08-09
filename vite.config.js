import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import { resolve } from 'path';

export default defineConfig({
  plugins: [react()],
  build: {
    lib: {
      entry: resolve(__dirname, 'resources/js/index.ts'),
      name: 'UniversalPanelUI',
      fileName: (format) => `universal-panel.${format}.js`,
    },
    outDir: 'public',
    rollupOptions: {
      external: ['react', 'react-dom', '@inertiajs/react'],
      output: {
        globals: {
          react: 'React',
          'react-dom': 'ReactDOM',
          '@inertiajs/react': 'InertiaReact',
        },
      },
    },
  },
  resolve: {
    alias: {
      '@': resolve(__dirname, 'resources/js'),
    },
  },
});
