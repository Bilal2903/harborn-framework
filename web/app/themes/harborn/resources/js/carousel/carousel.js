import Swiper, { FreeMode, Mousewheel } from 'swiper';
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/mousewheel';

document.addEventListener('DOMContentLoaded', function () {
  const swiperElement = document.querySelector('.carousel-block__swiper.swiper');

  if (swiperElement) {
    Swiper.use([FreeMode, Mousewheel]);
    const swiper = new Swiper(swiperElement, {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      grabCursor: true,
      mousewheel: true,
      breakpoints: {
        0: { slidesPerView: 1.1, spaceBetween: 10 },
        768: { slidesPerView: 2.1, spaceBetween: 20 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
      },
    });

    let isDragging = false;
    swiper.on('slideChangeTransitionStart', function () {
      isDragging = true;
    });
    swiperElement.querySelectorAll('.project-card').forEach(link => {
      link.addEventListener('click', function(e) {
        if (isDragging) {
          e.preventDefault();
          e.stopImmediatePropagation();
        }
        isDragging = false;
      });
    });
    swiper.on('touchEnd', function () {
      setTimeout(() => { isDragging = false; }, 10);
    });
  }
});