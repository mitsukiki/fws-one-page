import AOS from "aos";
import "aos/dist/aos.css";

export function initializeAOS() {
  const offsetValue = window.innerWidth <= 767 ? 50 : 100;

  AOS.init({
    duration: 1000,
    easing: "ease",
    delay: 0,
    once: true,
    offset: offsetValue,
    anchorPlacement: "center-center",
  });
}

export function setupAnimations() {
  // 初期化
  initializeAOS();

  // ウィンドウのリサイズ時に再初期化
  window.addEventListener("resize", initializeAOS);
}
