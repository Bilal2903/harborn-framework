import.meta.glob(['../images/**', '../fonts/**']);

// eslint-disable-next-line import/no-unresolved -- Swiper exposes this ESM entry point via package exports.
import 'swiper/element/bundle';

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
