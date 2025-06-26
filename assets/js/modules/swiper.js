import Swiper from "swiper";
import { Autoplay, EffectFade, Pagination, Navigation, Thumbs } from "swiper/modules";

export function initSwipers() {
  // FV PCスワイパー
  var fvSwiper = new Swiper(".front-fv-img__list-wrapper", {
    modules: [Autoplay, Pagination],
    loop: true, // ループ有効
    speed: 2500, // ループの時間
    autoplay: {
      delay: 3000,
      reverseDirection: false, // 逆方向有効化
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    centeredSlides: true,
    spaceBetween: 9,
    slidesPerView: 1.17,
    breakpoints: {
      769: {
        spaceBetween: 24,
        slidesPerView: 1.7,
      }
    }
  });

  // サムネイルスワイパーの初期化
  // setupThumbnailSwiper();

  // FVスワイパーの複製
  setupSwiperDuplication();

  return { fvSwiper };
}

function setupThumbnailSwiper() {
  // スライダー
  const slider = new Swiper(".front-photo-nav", {
    modules: [Autoplay, Pagination, Navigation, Thumbs],
    loop: true,
    allowTouchMove: false
  });

  // サムネイル
  const sliderThumbnail = new Swiper(".front-photo-thumbnail", {
    modules: [Autoplay, Pagination, Navigation, Thumbs],
    centeredSlides: true,
    slidesPerView: 4.5,
    spaceBetween: 5,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    // thumbs に メインのスライダ
    thumbs: {
      swiper: slider
    },
    breakpoints: {
      769: {
        slidesPerView: 7,
        spaceBetween: 10,
      }
    }
  });
}

function setupSwiperDuplication() {
  // PCスワイパーのアイテム複製
  duplicateSwiperItems(".front-fv-img__list-wrapper");

}

function duplicateSwiperItems(swiperSelector) {
  const fvItems = document.querySelectorAll(`${swiperSelector} .front-fv-img__item`);
  if (fvItems.length > 0 && fvItems.length < 10) {
    const fvContainer = document.querySelector(`${swiperSelector} .swiper-wrapper`);
    const originalItems = Array.from(fvItems);
    const multiplier = Math.ceil(10 / fvItems.length);

    for (let i = 0; i < multiplier - 1; i++) {
      originalItems.forEach((item) => {
        const clonedItem = item.cloneNode(true);
        clonedItem.classList.add(`cloned-item`);
        fvContainer.appendChild(clonedItem);
      });
    }
  }
}

export function setupPaginationHiding(fvSwiper, fvSpSwiper) {
  // PCスワイパーのページネーション調整
  const fvItems = document.querySelectorAll(".front-fv-main_pc .front-fv-main__item");
  fvSwiper.on("paginationRender", () => {
    const paginationBullets = document.querySelectorAll(".front-fv-main_pc .swiper-pagination .swiper-pagination-bullet");
    paginationBullets.forEach((bullet, index) => {
      if (index >= fvItems.length) {
        bullet.style.display = "none";
      }
    });
  });

  // SPスワイパーのページネーション調整
  const fvSpItems = document.querySelectorAll(".front-fv-main_sp .front-fv-main__item");
  fvSpSwiper.on("paginationRender", () => {
    const paginationBullets = document.querySelectorAll(".front-fv-main_sp .swiper-pagination .swiper-pagination-bullet");
    paginationBullets.forEach((bullet, index) => {
      if (index >= fvSpItems.length) {
        bullet.style.display = "none";
      }
    });
  });
}
