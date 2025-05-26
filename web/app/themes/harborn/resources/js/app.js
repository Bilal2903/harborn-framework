import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import Swiper from 'swiper';

document.addEventListener('DOMContentLoaded', function () {
  const swiperElement = document.querySelector('.carousel-block__swiper');

  // Drag/click fix voor project-card links
  let isDragging = false;
  let dragStartX = 0;
  let dragThreshold = 10; // pixels

  if (swiperElement) {
    swiperElement.addEventListener('mousedown', function(e) {
      isDragging = false;
      dragStartX = e.clientX;
    });
    swiperElement.addEventListener('mousemove', function(e) {
      if (e.buttons) {
        if (Math.abs(e.clientX - dragStartX) > dragThreshold) {
          isDragging = true;
        }
      }
    });
    swiperElement.addEventListener('mouseup', function() {
      setTimeout(() => { isDragging = false; }, 50);
    });
    swiperElement.addEventListener('mouseleave', function() {
      setTimeout(() => { isDragging = false; }, 50);
    });
    swiperElement.addEventListener('click', function(e) {
      if (isDragging) {
        e.preventDefault();
        e.stopPropagation();
      }
    }, true);
  }

  // Drag-to-scroll functionaliteit voor muis
  if (swiperElement) {
    let isDown = false;
    let startX;
    let scrollLeft;

    swiperElement.addEventListener('mousedown', (e) => {
      isDown = true;
      swiperElement.classList.add('is-dragging');
      startX = e.pageX - swiperElement.offsetLeft;
      scrollLeft = swiperElement.scrollLeft;
    });
    swiperElement.addEventListener('mouseleave', () => {
      isDown = false;
      swiperElement.classList.remove('is-dragging');
    });
    swiperElement.addEventListener('mouseup', () => {
      isDown = false;
      swiperElement.classList.remove('is-dragging');
    });
    swiperElement.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - swiperElement.offsetLeft;
      const walk = (x - startX) * 1.5; // scroll-snelheid
      swiperElement.scrollLeft = scrollLeft - walk;
    });
  }

  if (swiperElement) {
    const swiper = new Swiper(swiperElement, {
      slidesPerView: 3,
      spaceBetween: 0, // Geen gap meer tussen de projecten
      loop: false,
      freeMode: true,
      grabCursor: true,
      breakpoints: {
        0: {
          slidesPerView: 1.1,
          spaceBetween: 0, // Geen gap op mobiel
        },
        768: {
          slidesPerView: 2.1,
          spaceBetween: 0, // Geen gap op tablet
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 0, // Geen gap op desktop
        },
      },
    });
  }
});