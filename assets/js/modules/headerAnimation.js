export function setupHeaderAnimation() {
  var header = document.getElementById("header");
  var headerNavLink = document.querySelectorAll(".header-nav__link");
  var sticky = false;
  var stickyTrigger = 700; // スクロール量を変更可能

  window.addEventListener("scroll", function () {
    if (window.scrollY > stickyTrigger && !sticky) {
      header.classList.remove("animate-header-slide-out-top");
      header.classList.add("animate-header-slide-in-top");
      header.classList.add("header_sticky");
      headerNavLink.forEach(function (link) {
        link.classList.add("header-nav__link_sticky");
      });
      sticky = true;
    } else if (window.scrollY <= stickyTrigger && sticky) {
      header.classList.remove("animate-header-slide-in-top");
      header.classList.remove("header_sticky");
      headerNavLink.forEach(function (link) {
        link.classList.remove("header-nav__link_sticky");
      });
      header.classList.add("animate-header-slide-out-top");
      sticky = false;

      setTimeout(function () {
        header.classList.remove("animate-header-slide-out-top");
      }, 300);
    }
  });
}
