/**
 * ページ読み込み完了時にローディング表示を非表示にする
 */
export function initLoading() {
  const loadingElement = document.getElementById("loading");
  
  if (loadingElement) {
    // Tailwindクラスを使わずに独自のクラスを使用
    loadingElement.classList.add("loading_hidden");
    
    // アニメーション終了後にHTML要素を完全に削除するオプション
    // setTimeout(() => {
    //   loadingElement.parentNode.removeChild(loadingElement);
    // }, 1000);
  }
  
  // bodyのローディング状態を解除
  document.body.classList.remove("is-loading");
}
