export function setHeaderHeight() {
  // 初期化
  document.documentElement.style.setProperty("--header-height", "auto");

  // header高さ取得
  const headerElement = document.getElementById("header");
  if (headerElement) {
    const headerHeight = headerElement.offsetHeight;

    // CSS変数定義
    document.documentElement.style.setProperty(
      "--header-height",
      `${headerHeight}px`
    );
  }
}

export function setupHeaderHeightUpdates() {
  window.addEventListener("resize", () => {
    // 画面の横幅のサイズ変動があった時のみ高さを再計算する
    setHeaderHeight();
  });

  // 初期化
  setHeaderHeight();
}
