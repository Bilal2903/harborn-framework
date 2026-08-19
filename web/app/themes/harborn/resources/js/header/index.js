import { initStickyHeader } from './sticky-header-logic.js';
import { initHamburgerToggle } from './hamburger-toggle.js';
import { initMegaMenu } from './mega-menu-logic.js';

document.addEventListener('DOMContentLoaded', function () {
  const stickyHeader = document.getElementById('stickyHeader');
  const mainHeader = document.querySelector('header.banner');
  const hamburgers = document.querySelectorAll('.hamburger-toggle');
  const megaMenuOverlay = document.getElementById('megaMenuOverlay');
  const megaMenuClose = document.querySelector('.mega-menu-close');

  const checkStickyHeader = initStickyHeader(stickyHeader, mainHeader);

  hamburgers.forEach(hamburger => {
    initHamburgerToggle(hamburger, stickyHeader);
    initMegaMenu(hamburger, megaMenuOverlay, megaMenuClose);
  });

  let ticking = false;

  window.addEventListener('scroll', function () {
    if (!ticking) {
      window.requestAnimationFrame(function () {
        checkStickyHeader();

        hamburgers.forEach(hamburger => {
          if (typeof hamburger.toggleHamburgerVisibility === 'function') {
            hamburger.toggleHamburgerVisibility();
          }
        });
        ticking = false;
      });
      ticking = true;
    }
  });
});
