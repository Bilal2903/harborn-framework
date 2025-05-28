document.addEventListener('DOMContentLoaded', function () {
  // Sticky header show/hide only when the original header is not visible
  var stickyHeader = document.getElementById('stickyHeader');
  var mainHeader = document.querySelector('header.banner');
  var lastScroll = 0;
  var ticking = false;

  function checkStickyHeader() {
    if (!mainHeader || !stickyHeader) return;
    var headerRect = mainHeader.getBoundingClientRect();
    if (headerRect.bottom <= 0) {
      stickyHeader.classList.add('is-visible');
      console.log('Sticky header zichtbaar');
    } else {
      stickyHeader.classList.remove('is-visible');
      console.log('Sticky header verborgen');
    }
  }

  // Hamburger toggle for mega menu
  var hamburger = document.querySelector('.hamburger-toggle');
  var megaMenuOverlay = document.getElementById('megaMenuOverlay');
  var megaMenuClose = document.querySelector('.mega-menu-close');

  // Hide hamburger if not in sticky header
  if (hamburger && stickyHeader && !stickyHeader.classList.contains('is-visible')) {
    hamburger.style.display = 'none';
  }

  // Show/hide hamburger only with sticky header
  function toggleHamburgerVisibility() {
    if (stickyHeader.classList.contains('is-visible')) {
      hamburger && (hamburger.style.display = 'flex');
    } else {
      hamburger && (hamburger.style.display = 'none');
    }
  }

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
  // Initialize state
  checkStickyHeader();
  toggleHamburgerVisibility();

  if (hamburger && megaMenuOverlay) {
    hamburger.addEventListener('click', function () {
      megaMenuOverlay.classList.add('is-active');
      document.body.classList.add('mega-menu-open');
    });
  }
  if (megaMenuClose && megaMenuOverlay) {
    megaMenuClose.addEventListener('click', function () {
      megaMenuOverlay.classList.remove('is-active');
      document.body.classList.remove('mega-menu-open');
    });
  }
  // Optional: close mega menu on overlay click
  megaMenuOverlay && megaMenuOverlay.addEventListener('click', function(e) {
    if (e.target === megaMenuOverlay) {
      megaMenuOverlay.classList.remove('is-active');
      document.body.classList.remove('mega-menu-open');
    }
  });
});