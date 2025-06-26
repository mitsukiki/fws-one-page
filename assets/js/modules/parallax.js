/**
 * Parallax Effect Module
 * パララックス効果を管理するモジュール
 */

export class ParallaxManager {
  constructor(options = {}) {
    this.config = {
      selector: '.common-parallax__inner',
      imageSelector: '.common-parallax-main__img',
      maxOffset: 50,
      maxBottomOffset: -150,
      ...options
    };
    
    this.ticking = false;  
    this.$parallaxElements = null;
    this.totalElements = 0;
    
    this.init();
  }

  /**
   * 要素がビューポート内にあるかチェック
   * @param {HTMLElement} element 
   * @returns {boolean}
   */
  isElementInViewport(element) {
    const rect = element.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    const windowWidth = window.innerWidth || document.documentElement.clientWidth;
    
    return (
      rect.top < windowHeight &&
      rect.bottom > 0 &&
      rect.left < windowWidth &&
      rect.right > 0
    );
  }

  /**
   * パララックス効果を更新
   */
  updateParallax() {
    const scroll = jQuery(window).scrollTop();
    const windowHeight = jQuery(window).height();
    console.log(`Scroll Position: ${scroll}, Window Height: ${windowHeight}`);
    if (this.totalElements === 0) return;
    
    const maxOffset = this.config.maxOffset;
    let globalProgress = 0;
    
    this.$parallaxElements.each((index, element) => {
      const $container = jQuery(element);
      
      if (this.isElementInViewport(element)) {
        const elementTop = $container.offset().top;
        const elementHeight = $container.outerHeight();
        
        // 要素が画面内にどの程度表示されているかを計算（0-1の値）
        const viewportProgress = Math.max(0, Math.min(1, 
          (scroll + windowHeight - elementTop) / (windowHeight + elementHeight)
        ));
        
        // 各要素の個別進行度を計算（0-1の値）
        const elementStart = elementTop - windowHeight;
        const elementEnd = elementTop + elementHeight;
        const elementRange = elementEnd - elementStart;
        
        const elementProgress = Math.max(0, Math.min(1, 
          (scroll - elementStart) / elementRange
        ));
        
        // Global Progress計算
        const progressPerElement = 100 / this.totalElements;
        globalProgress = (index * progressPerElement + elementProgress * progressPerElement) / 100;
        
        // globalProgressに比例してmaxOffsetから0に変化
        const currentMaxOffset = maxOffset * (1 - globalProgress);
        
        // 個別要素のパララックス効果
        const localOffset = (viewportProgress - 0.5) * currentMaxOffset;
        
        // 最終オフセット
        const finalOffset = localOffset;
        
        // bottom値が0以上にならないように制限
        const limitedOffset = Math.min(0, finalOffset);

        // デバッグログ（必要に応じてコメントアウト）
        // console.log(`Section ${index + 1}:`);
        // console.log(`  Element Progress: ${(elementProgress * 100).toFixed(1)}%`);
        // console.log(`  Global Progress: ${(globalProgress * 100).toFixed(1)}%`);
        // console.log(`  Current Max Offset: ${currentMaxOffset.toFixed(2)}`);
        // console.log(`  Local Offset: ${localOffset.toFixed(2)}`);
        // console.log(`  Final Offset: ${limitedOffset.toFixed(2)}`);
      }
      
      // この要素内の画像に適用
      const bottomOffset = this.config.maxBottomOffset * (1 - globalProgress);
      $container.find(this.config.imageSelector).css({
        bottom: bottomOffset + 'px'
      });
    });
    
    this.ticking = false;
  }

  /**
   * スクロールイベントハンドラー
   */
  handleScroll() {
    if (!this.ticking) {
      requestAnimationFrame(() => this.updateParallax());
      this.ticking = true;
    }
  }

  /**
   * 要素を再取得
   */
  refreshElements() {
    this.$parallaxElements = jQuery(this.config.selector);
    this.totalElements = this.$parallaxElements.length;
  }

  /**
   * イベントリスナーを追加
   */
  bindEvents() {
    jQuery(window).on('scroll.parallax', () => this.handleScroll());
    jQuery(window).on('resize.parallax', () => {
      this.refreshElements();
      this.updateParallax();
    });
  }

  /**
   * イベントリスナーを削除
   */
  unbindEvents() {
    jQuery(window).off('scroll.parallax');
    jQuery(window).off('resize.parallax');
  }

  /**
   * 初期化
   */
  init() {
    const initialize = () => {
      this.refreshElements();
      this.bindEvents();
      this.updateParallax();
    };

    if (document.readyState === 'loading') {
      jQuery(document).ready(initialize);
    } else {
      initialize();
    }
  }

  /**
   * 破棄
   */
  destroy() {
    this.unbindEvents();
    this.$parallaxElements = null;
    this.totalElements = 0;
  }

  /**
   * 設定を更新
   * @param {Object} newOptions 
   */
  updateConfig(newOptions) {
    this.config = { ...this.config, ...newOptions };
    this.refreshElements();
  }
}

// デフォルトインスタンス
let defaultParallaxManager = null;

/**
 * パララックス効果を初期化
 * @param {Object} options 設定オプション
 * @returns {ParallaxManager}
 */
export function initParallax(options = {}) {
  if (defaultParallaxManager) {
    defaultParallaxManager.destroy();
  }
  
  defaultParallaxManager = new ParallaxManager(options);
  return defaultParallaxManager;
}

/**
 * パララックス効果を停止
 */
export function destroyParallax() {
  if (defaultParallaxManager) {
    defaultParallaxManager.destroy();
    defaultParallaxManager = null;
  }
}

/**
 * デフォルトのパララックス効果を取得
 * @returns {ParallaxManager|null}
 */
export function getParallaxManager() {
  return defaultParallaxManager;
}

// 便利関数: 簡単な初期化
export function setupParallax(selector = '.common-parallax__inner', imageSelector = '.common-parallax-main__img') {
  return initParallax({
    selector,
    imageSelector
  });
}