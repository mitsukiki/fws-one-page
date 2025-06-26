export function setupAnchorLinks() {
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  const anchorLinksArr = Array.prototype.slice.call(anchorLinks);

  anchorLinksArr.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const targetId = link.hash;
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        // CSS変数からヘッダーの高さを取得
        const headerHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--header-height')) || 0;
        
        const targetOffsetTop = window.pageYOffset + targetElement.getBoundingClientRect().top - headerHeight;
        window.scrollTo({
          top: targetOffsetTop,
          behavior: "smooth"
        });
      }
    });
  });
}