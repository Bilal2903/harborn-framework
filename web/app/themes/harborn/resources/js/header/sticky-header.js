import { setupStickyHeader } from './_sticky-header-logic.js';
import { setupHamburgerToggle } from './_hamburger-toggle.js';
import { setupMegaMenu } from './_mega-menu-logic.js';

document.addEventListener('DOMContentLoaded', function () {
  const stickyHeader = document.getElementById('stickyHeader');
  const mainHeader = document.querySelector('header.banner');
  const hamburger = document.querySelector('.hamburger-toggle');
  const megaMenuOverlay = document.getElementById('megaMenuOverlay');
  const megaMenuClose = document.querySelector('.mega-menu-close');

  const checkStickyHeader = setupStickyHeader(stickyHeader, mainHeader);
  const toggleHamburgerVisibility = setupHamburgerToggle(hamburger, stickyHeader);
  setupMegaMenu(hamburger, megaMenuOverlay, megaMenuClose);

  let ticking = false;

  window.addEventListener('scroll', function () {
    if (!ticking) {
      window.requestAnimationFrame(function () {
        checkStickyHeader();
        toggleHamburgerVisibility();
        ticking = false;
      });
      ticking = true;
    }
  });
});