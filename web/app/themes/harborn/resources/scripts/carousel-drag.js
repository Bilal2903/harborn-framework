(function() {
  const swiper = document.querySelector('.section-work-overview .swiper');
  if (!swiper) return;
  let isDown = false;
  let startX;
  let scrollLeft;

  swiper.addEventListener('mousedown', (e) => {
    isDown = true;
    swiper.classList.add('dragging');
    startX = e.pageX - swiper.offsetLeft;
    scrollLeft = swiper.scrollLeft;
    e.preventDefault();
  });
  swiper.addEventListener('mouseleave', () => {
    isDown = false;
    swiper.classList.remove('dragging');
  });
  swiper.addEventListener('mouseup', () => {
    isDown = false;
    swiper.classList.remove('dragging');
  });
  swiper.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - swiper.offsetLeft;
    const walk = (x - startX) * 1.2;
    swiper.scrollLeft = scrollLeft - walk;
  });
})();
