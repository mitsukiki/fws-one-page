export class Dropdown {
  constructor(selector) {
    this.dropdowns = document.querySelectorAll(selector);
    this.init();
  }

  init() {
    this.dropdowns.forEach((dropdown) => {
      const header = dropdown.querySelector(".dropdown-header");
      const content = dropdown.querySelector(".dropdown-content");
      const arrow = dropdown.querySelector(".dropdown-arrow");

      header.addEventListener("click", () => {
        if (arrow) {
          arrow.classList.toggle("dropdown-arrow_open");
        }
        content.classList.toggle("dropdown-content_open");
      });
    });
  }
}

export function initDropdowns() {
  const dropdown = new Dropdown(".dropdown");
  return dropdown;
}
