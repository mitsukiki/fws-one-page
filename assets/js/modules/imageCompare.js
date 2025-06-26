import ImageCompare from "image-compare-viewer";

export function initImageCompare() {
  const element01 = document.getElementById("image-compare-pc");
  const element02 = document.getElementById("image-compare-sp");

  if (element01) {
    const viewer01 = new ImageCompare(element01).mount();
  }
  if (element02) {
    const viewer02 = new ImageCompare(element02).mount();
  }
}
