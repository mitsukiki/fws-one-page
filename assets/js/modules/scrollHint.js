import ScrollHint from "scroll-hint";

export function initScrollHint() {
  new ScrollHint(".js-scrollable", {
    scrollHintIconAppendClass: "scroll-hint-icon-white",
    suggestiveShadow: true,
    i18n: {
      scrollable: "スクロールできます",
    },
  });
}
