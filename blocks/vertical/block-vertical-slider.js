document.addEventListener("DOMContentLoaded", function () {
    function initializeVerticalSlider() {

const swiper = new swiper('.swiper-slide-up', {
  // Optional parameters
  direction: 'vertical',
    loop: false,
      spaceBetween: 0,
  grabCursor: true,
  mouseScroll: true,
             mousewheel: {
    invert: false,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

 
});
      
            }

      // Initialize the swiper
     initializeVerticalSlider();
});
