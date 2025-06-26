/**
 * Element Height Manager
 * 指定されたクラス名やIDを持つ要素の高さを取得し、CSS変数として設定する
 */

export class ElementHeightManager {
  constructor() {
    this.elements = new Map();
    this.resizeObserver = null;
    this.debounceTimer = null;
    this.debounceDelay = 100;
  }

  /**
   * 要素を登録してCSS変数を設定
   * @param {string} selector - セレクター（クラス名、ID、タグ名など）
   * @param {string} cssVariable - CSS変数名（--から始まる）
   * @param {Object} options - オプション設定
   */
  addElement(selector, cssVariable, options = {}) {
    const defaultOptions = {
      unit: 'px', // 単位（px, rem, em, vh, vw など）
      property: 'offsetHeight', // 取得するプロパティ（offsetHeight, clientHeight, scrollHeight）
      fallback: 'auto', // 要素が見つからない場合のフォールバック値
      precision: 0 // 小数点以下の桁数
    };

    const config = { ...defaultOptions, ...options };
    
    this.elements.set(selector, {
      cssVariable,
      config,
      element: null
    });

    this.updateElement(selector);
  }

  /**
   * 複数の要素を一括登録
   * @param {Array} elementConfigs - 要素設定の配列
   */
  addElements(elementConfigs) {
    elementConfigs.forEach(({ selector, cssVariable, options }) => {
      this.addElement(selector, cssVariable, options);
    });
  }

  /**
   * 特定の要素の高さを更新
   * @param {string} selector - セレクター
   */
  updateElement(selector) {
    const elementData = this.elements.get(selector);
    if (!elementData) return;

    const element = document.querySelector(selector);
    const { cssVariable, config } = elementData;

    if (element) {
      elementData.element = element;
      const height = element[config.property];
      const value = config.precision > 0 
        ? parseFloat(height.toFixed(config.precision))
        : Math.round(height);
      
      document.documentElement.style.setProperty(
        cssVariable,
        `${value}${config.unit}`
      );
    } else {
      // 要素が見つからない場合はフォールバック値を設定
      document.documentElement.style.setProperty(cssVariable, config.fallback);
    }
  }

  /**
   * 全ての要素の高さを更新
   */
  updateAllElements() {
    this.elements.forEach((_, selector) => {
      this.updateElement(selector);
    });
  }

  /**
   * デバウンス処理付きの更新
   */
  debouncedUpdate() {
    if (this.debounceTimer) {
      clearTimeout(this.debounceTimer);
    }
    
    this.debounceTimer = setTimeout(() => {
      this.updateAllElements();
    }, this.debounceDelay);
  }

  /**
   * リサイズ監視を開始
   */
  startResizeObserver() {
    if (this.resizeObserver) return;

    // ResizeObserverが利用可能な場合は使用
    if (window.ResizeObserver) {
      this.resizeObserver = new ResizeObserver(() => {
        this.debouncedUpdate();
      });

      // 登録された要素を監視対象に追加
      this.elements.forEach((elementData) => {
        if (elementData.element) {
          this.resizeObserver.observe(elementData.element);
        }
      });
    }

    // windowのresizeイベントもフォールバックとして使用
    window.addEventListener('resize', () => {
      this.debouncedUpdate();
    });
  }

  /**
   * リサイズ監視を停止
   */
  stopResizeObserver() {
    if (this.resizeObserver) {
      this.resizeObserver.disconnect();
      this.resizeObserver = null;
    }

    window.removeEventListener('resize', this.debouncedUpdate);
  }

  /**
   * 要素を削除
   * @param {string} selector - セレクター
   */
  removeElement(selector) {
    const elementData = this.elements.get(selector);
    if (elementData && elementData.element && this.resizeObserver) {
      this.resizeObserver.unobserve(elementData.element);
    }
    
    this.elements.delete(selector);
  }

  /**
   * 全ての要素をクリア
   */
  clear() {
    this.stopResizeObserver();
    this.elements.clear();
  }

  /**
   * 初期化（DOM読み込み完了後に実行）
   */
  init() {
    const initializeManager = () => {
      this.updateAllElements();
      this.startResizeObserver();
    };

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initializeManager);
    } else {
      initializeManager();
    }
  }
}

// デフォルトインスタンスをエクスポート
export const heightManager = new ElementHeightManager();

// 便利関数をエクスポート
export function setElementHeight(selector, cssVariable, options = {}) {
  heightManager.addElement(selector, cssVariable, options);
}

export function setElementHeights(elementConfigs) {
  heightManager.addElements(elementConfigs);
}

export function initHeightManager() {
  heightManager.init();
}