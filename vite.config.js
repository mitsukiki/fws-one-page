import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';
import { resolve } from 'path';
import VitePluginWebpAndPath from 'vite-plugin-webp-and-path';
const themePath = '/wp-content/themes/base';
const assets = process.env.NODE_ENV === 'development' ? '/' : '/dist/';

// https://vitejs.dev/config
export default defineConfig({

  plugins: [
    //vue(),
    liveReload([
      __dirname + '/**/*.php',
      __dirname + '/**/*.json',
    ]),
    VitePluginWebpAndPath({
      targetDir: './dist/',  // デフォルトは './dist/'
      imgExtensions: 'jpg,png',  // デフォルトは 'jpg,png'
      textExtensions: 'json,html,css',  // デフォルトは 'html,css'
      quality: 80,  // デフォルトは 80
    }),
  ],

  // config
  root: '',
  base: process.env.NODE_ENV === 'development'
    ? `/wp-content/themes/${process.env.WP_THEME_NAME}/`
    : ``,

  build: {
    assetsInlineLimit: 0,
    outDir: resolve(__dirname, './dist'),
    emptyOutDir: true,

    manifest: true,

    rollupOptions: {
      input: {
        main: resolve(__dirname + '/main.js'),
        editor: resolve(__dirname + '/editor.js'), // editor.scssを追加
        // admin: resolve(__dirname + '/admin.js') // 管理画面専用のエントリポイント
      },

      output: {
        entryFileNames(chunkInfo) {
          // editor.scssから生成されるJSファイルは不要なので特別な名前にする
          if (chunkInfo.name === 'editor') {
            return 'assets/js/[name]-[hash].js'; // 通常通り生成（後で削除可能）
          }
          return 'assets/js/[name]-[hash].js';
        },
        assetFileNames(assetInfo) {
          console.log(assetInfo.name);
          
          // editor.scssから生成されるCSSファイルを特別に処理
          if (assetInfo.name === 'editor.css') {
            return 'editor-style.[ext]'; // ハッシュなしで固定名
          }
          
          if (/\.(gif|jpeg|jpg|png|svg|webp)$/.test(assetInfo.name ?? '')) {
            return 'assets/img/[name]-[hash].[ext]';
          }
          if (/\.mp4$/.test(assetInfo.name ?? '')) {
            return 'assets/video/[name]-[hash].[ext]';
          }
          if (/\.css$/.test(assetInfo.name ?? '')) {
            return 'assets/css/[name]-[hash].[ext]';
          }
          if (/\.js$/.test(assetInfo.name ?? '')) {
            return 'assets/js/[name]-[hash].[ext]';
          }
          return 'assets/[name].[ext]';
        }
      }
    },
    // minifying switch
    minify: true,
    write: true
  },

  server: {
    port: 5173,
    host: true,
    hmr: {
      host: 'localhost',
      // port: 81
    },
    watch: {
      usePolling: true
    }
  },

  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `$base-dir: '` + themePath + assets + `';`,
      },
    },
  },
})