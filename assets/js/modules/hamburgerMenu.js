export function toggleMultipleClasses(element, ...classNames) {
  classNames.forEach((className) => {
    element.classList.toggle(className);
  });
}

export function setupHamburgerMenu() {
  var button = document.getElementById("header-nav-btn");
  var navigation = document.getElementById("header-nav-sp");
  var topBar = document.getElementById("header-nav-btn__top-bar");
  var middleBar = document.getElementById("header-nav-btn__middle-bar");
  var bottomBar = document.getElementById("header-nav-btn__bottom-bar");

  if (button && navigation && topBar && middleBar && bottomBar) {
    button.addEventListener("click", () => {
      navigation.classList.toggle("header-nav-sp_open");

      topBar.classList.toggle("header-nav__line_top_open");
      middleBar.classList.toggle("header-nav__line_middle_open");
      bottomBar.classList.toggle("header-nav__line_bottom_open");
      document.body.classList.toggle("body_menu-open");
    });

    // ナビゲーションリンクのクリック時にメニューを閉じる
    setupNavLinkClickHandlers(topBar, middleBar, bottomBar, navigation);
  }
}

function setupNavLinkClickHandlers(topBar, middleBar, bottomBar, navigation) {
  // リンク要素を取得
  const navLinks = document.querySelectorAll('.header-nav-sp-list__link');

  // 各リンク要素にクリックイベントリスナーを追加
  navLinks.forEach(link => {
    link.addEventListener('click', function () {
      if (navigation) {
        navigation.classList.toggle("header-nav-sp_open");

        topBar.classList.toggle("header-nav__line_top_open");
        middleBar.classList.toggle("header-nav__line_middle_open");
        bottomBar.classList.toggle("header-nav__line_bottom_open");
        document.body.classList.toggle("body_menu-open");
      }
    });
  });
}
