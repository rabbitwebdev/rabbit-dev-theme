(function () {
  // Your jQuery code here
var image = document.getElementsByClassName('img-scroll');
new simpleParallax(image, {
    orientation: 'down',
    delay: '1.9',
});
  
var image = document.getElementsByClassName('img-down');
new simpleParallax(image, {
  orientation: 'right',
  scale: 1.5,
  overflow: true,
    delay: '1.1',
});
  
  var image = document.getElementsByClassName('img-right');
new simpleParallax(image, {
  orientation: 'left',
  scale: 1.5,
  overflow: true,
    delay: '1.1',
});
  
  var image = document.getElementsByClassName('img-left');
new simpleParallax(image, {
  orientation: 'right',
  scale: 1.5,
  overflow: true,
    delay: '1.1',
});
  
    var imageUp = document.getElementsByClassName('img-up');
new simpleParallax(imageUp, {
  orientation: 'up',
  scale: 1.3,
  overflow: true,
  delay: '1.5',
       transition: 'cubic-bezier(0,0,0,5)'
});

      var image = document.getElementsByClassName('img-left-right');
new simpleParallax(image, {
  orientation: 'left',
  scale: 1.2,
  overflow: true,
    delay: '1.1',
});
  
  var imageHero = document.getElementsByClassName('img-scroll-hero');
new simpleParallax(imageHero, {
  orientation: 'up',
  scale: 1.7,
    overflow: false,
  delay: '1.3',
     transition: 'cubic-bezier(0,0,0,5)'
});
  
// Select all elements with the 'fade-out' class
const fadeElements = document.querySelectorAll('.text-fade-out');

// Function to check element visibility based on scroll
function handleScroll() {
    fadeElements.forEach(element => {
        const rect = element.getBoundingClientRect();
        const elementTop = rect.top;
        const windowHeight = window.innerHeight;

        // If the element has scrolled past a certain threshold, add 'hidden' class
        if (elementTop < windowHeight - 700) {
            element.classList.add('hidden');
        } else {
            element.classList.remove('hidden');
        }
    });
}

// Event listener for scroll
window.addEventListener('scroll', handleScroll);

// Initial check in case elements are already visible on load
handleScroll();

// Initialize the function for '.fade-out' elements
initializeFadeInLeftcroll('.text-fade-in-left', 100);
function initializeFadeInLeftcroll(selector, offset = 100) {
    // Select all elements with the provided selector (e.g., '.fade-out')
    const fadeElements = document.querySelectorAll(selector);

    // Function to check element visibility based on scroll
    function handleScroll() {
        fadeElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            const elementTop = rect.top;
            const windowHeight = window.innerHeight;

            // If the element is in view, add 'visible' class
            if (elementTop < windowHeight - offset) {
                element.classList.add('visible');
            } else {
                element.classList.remove('visible');
            }
        });
    }

    // Event listener for scroll
    window.addEventListener('scroll', handleScroll);

    // Initial check in case elements are already visible on load
    handleScroll();
}
  

  


document.addEventListener("DOMContentLoaded", function () {
  // script.js
  const SCROLL_THRESHOLD = 250;
    let previousScrollY = window.scrollY;
    const header = document.getElementById('masthead');
    const threshold = SCROLL_THRESHOLD; // Scroll threshold

    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;

        if (currentScrollY < threshold) {
            // Before reaching the threshold, ensure the header is visible
            header.classList.remove('hidden');
          header.classList.add('visible');
            header.classList.remove('visible-color');
        } else if (currentScrollY > previousScrollY) {
            // Scrolling down after the threshold
            header.classList.add('hidden');
          header.classList.remove('visible');
          header.classList.remove('visible-color');
        } else {
            // Scrolling up after the threshold
            header.classList.remove('hidden');
            header.classList.add('visible-color');
        }

        previousScrollY = currentScrollY;
    });

});


})(jQuery);
