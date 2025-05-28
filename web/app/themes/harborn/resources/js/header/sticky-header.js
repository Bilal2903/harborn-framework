document.addEventListener('DOMContentLoaded', function () {
  var stickyHeader = document.getElementById('stickyHeader');
  var mainHeader = document.querySelector('header.banner');
  var ticking = false;

  // Checks if the sticky header should be visible or hidden based on scroll position.
  function checkStickyHeader() {
    if (!mainHeader || !stickyHeader) return;
    var headerRect = mainHeader.getBoundingClientRect();
    if (headerRect.bottom <= 0) {
      stickyHeader.classList.add('is-visible');
    } else {
      stickyHeader.classList.remove('is-visible');
    }
  }

  var hamburger = document.querySelector('.hamburger-toggle');
  var megaMenuOverlay = document.getElementById('megaMenuOverlay');
  var megaMenuClose = document.querySelector('.mega-menu-close');

  // Toggles the visibility of the hamburger menu based on the sticky header's visibility.
  function toggleHamburgerVisibility() {
    if (hamburger) {
      if (stickyHeader.classList.contains('is-visible')) {
        hamburger.style.display = 'flex';
      } else {
        hamburger.style.display = 'none';
      }
    }
  }

  // No longer positions the close button based on hamburger,
  // CSS handles absolute positioning within the overlay.
  // This function is now effectively removed or kept empty if you want to explicitly not use it.
  function positionCloseButton() {
    // This function is no longer needed as the 'X' button is absolutely positioned
    // within the mega-menu-overlay by CSS, based on the image.
    // We keep it empty or remove calls to it.
  }


  window.addEventListener('scroll', function () {
    if (!ticking) {
      window.requestAnimationFrame(function () {
        checkStickyHeader();
        toggleHamburgerVisibility();
        // Removed the call to positionCloseButton here as it's not needed for absolute positioning
        ticking = false;
      });
      ticking = true;
    }
  });

  // Initialize state on page load.
  checkStickyHeader();
  toggleHamburgerVisibility();

  if (hamburger && megaMenuOverlay) {
    hamburger.addEventListener('click', function () {
      megaMenuOverlay.classList.add('is-active');
      document.body.classList.add('mega-menu-open');
      hamburger.classList.add('is-active');
      // Removed the call to positionCloseButton here as it's not needed for absolute positioning
      // window.addEventListener('resize', positionCloseButton); // No longer needed
    });
  }

  if (megaMenuClose && megaMenuOverlay) {
    megaMenuClose.addEventListener('click', function () {
      megaMenuOverlay.classList.remove('is-active');
      document.body.classList.remove('mega-menu-open');
      hamburger.classList.remove('is-active');
      // Removed the call to removeEventListener for positionCloseButton
      // window.removeEventListener('resize', positionCloseButton);
    });
  }

  // Close mega menu when clicking on the overlay background.
  megaMenuOverlay && megaMenuOverlay.addEventListener('click', function(e) {
    // Only close if the click is directly on the overlay background, not on the content columns.
    if (e.target === megaMenuOverlay || e.target.closest('.mega-menu-close')) { // Added click on close button also
      megaMenuOverlay.classList.remove('is-active');
      document.body.classList.remove('mega-menu-open');
      hamburger.classList.remove('is-active');
      // Removed the call to removeEventListener for positionCloseButton
      // window.removeEventListener('resize', positionCloseButton);
    }
  });
});