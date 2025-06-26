// モジュールのインポート
import { initImageCompare } from "./modules/imageCompare";
import { initScrollHint } from "./modules/scrollHint";
import { setupAnimations } from "./modules/animation";
import { initLoading } from "./modules/loading";
import { initSwipers, setupPaginationHiding } from "./modules/swiper";
import { setHeaderHeight, setupHeaderHeightUpdates } from "./modules/headerHeight";
import { setupAnchorLinks } from "./modules/anchorLinks";
import { initDropdowns } from "./modules/dropdown";
import { setupHeaderAnimation } from "./modules/headerAnimation";
import { setupHamburgerMenu } from "./modules/hamburgerMenu";
import { setElementHeight, setElementHeights, initHeightManager } from
  './modules/elementHeightManager.js';
import { initParallax, setupParallax } from './modules/parallax.js';

// DOMContentLoaded イベント
document.addEventListener("DOMContentLoaded", () => {
  // 画像比較機能の初期化
  initImageCompare();

  // スクロールヒントの初期化
  initScrollHint();

  // ヘッダー高さの設定
  // setupHeaderHeightUpdates();



  // アンカーリンクの設定
  setupAnchorLinks();

  // ドロップダウンの初期化
  initDropdowns();

  // ヘッダーアニメーションの設定
  setupHeaderAnimation();

  // ハンバーガーメニューの設定
  setupHamburgerMenu();
});

// window.load イベント
window.addEventListener("load", () => {
  // ローディング完了の処理
  initLoading();

  // アニメーションの設定
  setupAnimations();

  // Swiper初期化
  const { fvSwiper } = initSwipers();

  // ページネーションの非表示設定
  // setupPaginationHiding(fvSwiper);

  setElementHeights([
    { selector: '#header', cssVariable: '--header-height' },
    { selector: '.front-fv-img', cssVariable: '--front-fv-img-height' }
  ]);

  // 基本的な使用方法
  setupParallax();

  // カスタム設定での初期化
  initParallax({
    selector: '.common-parallax',
    imageSelector: '.common-parallax-main__img',
    maxOffset: 100,
    maxBottomOffset: -200
  });
});