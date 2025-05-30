export function initHamburgerToggle(hamburger, stickyHeader) {
  if (!hamburger || !stickyHeader) return;

  function toggleHamburgerVisibility() {
    if (stickyHeader.classList.contains('is-visible')) {
      hamburger.style.display = 'flex';
    } else {
      hamburger.style.display = 'none';
    }
  }

  // Initial call
  toggleHamburgerVisibility();

  return toggleHamburgerVisibility;
}