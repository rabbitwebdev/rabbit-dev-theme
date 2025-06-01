/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/***/ (() => {

(function () {
  // Your jQuery code here
  var image = document.getElementsByClassName('img-scroll');
  new simpleParallax(image, {
    orientation: 'down',
    delay: '1.9'
  });
  var image = document.getElementsByClassName('img-down');
  new simpleParallax(image, {
    orientation: 'right',
    scale: 1.5,
    overflow: true,
    delay: '1.1'
  });
  var image = document.getElementsByClassName('img-right');
  new simpleParallax(image, {
    orientation: 'left',
    scale: 1.5,
    overflow: true,
    delay: '1.1'
  });
  var image = document.getElementsByClassName('img-left');
  new simpleParallax(image, {
    orientation: 'right',
    scale: 1.5,
    overflow: true,
    delay: '1.1'
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
    delay: '1.1'
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
  var fadeElements = document.querySelectorAll('.text-fade-out');

  // Function to check element visibility based on scroll
  function handleScroll() {
    fadeElements.forEach(function (element) {
      var rect = element.getBoundingClientRect();
      var elementTop = rect.top;
      var windowHeight = window.innerHeight;

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
  function initializeFadeInLeftcroll(selector) {
    var offset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 100;
    // Select all elements with the provided selector (e.g., '.fade-out')
    var fadeElements = document.querySelectorAll(selector);

    // Function to check element visibility based on scroll
    function handleScroll() {
      fadeElements.forEach(function (element) {
        var rect = element.getBoundingClientRect();
        var elementTop = rect.top;
        var windowHeight = window.innerHeight;

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
    var SCROLL_THRESHOLD = 250;
    var previousScrollY = window.scrollY;
    var header = document.getElementById('masthead');
    var threshold = SCROLL_THRESHOLD; // Scroll threshold

    window.addEventListener('scroll', function () {
      var currentScrollY = window.scrollY;
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

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/acf-input.scss":
/*!****************************!*\
  !*** ./src/acf-input.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./blocks/scroll/block-page-scroll.scss":
/*!**********************************************!*\
  !*** ./blocks/scroll/block-page-scroll.scss ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/js/app": 0,
/******/ 			"blocks/scroll/block-page-scroll": 0,
/******/ 			"dist/css/acf-input": 0,
/******/ 			"dist/css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkdev_rabbit"] = self["webpackChunkdev_rabbit"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["blocks/scroll/block-page-scroll","dist/css/acf-input","dist/css/app"], () => (__webpack_require__("./src/app.js")))
/******/ 	__webpack_require__.O(undefined, ["blocks/scroll/block-page-scroll","dist/css/acf-input","dist/css/app"], () => (__webpack_require__("./src/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["blocks/scroll/block-page-scroll","dist/css/acf-input","dist/css/app"], () => (__webpack_require__("./src/acf-input.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["blocks/scroll/block-page-scroll","dist/css/acf-input","dist/css/app"], () => (__webpack_require__("./blocks/scroll/block-page-scroll.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;