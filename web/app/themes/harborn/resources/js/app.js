import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import { initBackToTopButton } from './back-to-top-button/back-to-top';
import { initCarousel } from './carousel/carousel';
import './header';

document.addEventListener('DOMContentLoaded', () => {
  if (document.getElementById('backToTopBtn')) {
    initBackToTopButton();
  }

  if (document.querySelector('swiper-container.mySwiper')) {
    initCarousel();
  }
});