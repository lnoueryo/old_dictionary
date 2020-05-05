/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/ex01.js":
/*!******************************!*\
  !*** ./resources/js/ex01.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('p').css('color', 'red');
}); // $(function() {
//     if ($('.abc'). = (3)) {
//         $('#genre2').hide();
//     }
// });

$("#genre").change(function () {
  var genre_val = $("#genre").val();

  if (genre_val == 3) {
    $('#genre2').show();
    $('select#genre2 option[value="2"]').show();
    $('select#genre2 option[value="3"]').show();
    $('select#genre2 option[value="4"]').show();
    $('select#genre2 option[value="5"]').hide();
    $('select#genre2 option[value="6"]').hide();
    $('select#genre2 option[value="7"]').hide();
  } else if (genre_val == 6) {
    $('#genre2').show();
    $('select#genre2 option[value="2"]').hide();
    $('select#genre2 option[value="3"]').hide();
    $('select#genre2 option[value="4"]').hide();
    $('select#genre2 option[value="5"]').show();
    $('select#genre2 option[value="6"]').show();
    $('select#genre2 option[value="7"]').show();
  } else {
    $('#genre2').hide(2000); //     $('.osaka').css('display', 'block');
    // }else if(extraction_val == "東京") {
    //     $('.tokyo').css('display', 'block');
    //     $('.osaka').css('display', 'none');
    // }else if(extraction_val == "大阪") {
    //     $('.tokyo').css('display', 'none');
    //     $('.osaka').css('display', 'block');
  }
});
$(document).on("click", ".add", function () {
  $(this).parent().clone(true).insertAfter($(this).parent());
});
$(document).on("click", ".del", function () {
  var target = $(this).parent();

  if (target.parent().children().length > 1) {
    target.remove();
  }
});
$('#myImage').on('change', function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#preview").attr('src', e.target.result);
  };

  reader.readAsDataURL(e.target.files[0]);
});
var music = new Audio();

function init() {
  music.preload = "auto";
  music.src = "./mymusic.mp3";
  music.load();
  music.addEventListener("ended", function () {
    music.currentTime = 0;
    music.play();
  }, false);
}

function play() {
  music.loop = true;
  music.play();
}

function stop() {
  music.pause();
  music.currentTime = 0;
}

init();

function audio_play() {
  audio.play();
}

function audio_pause() {
  audio.pause();
}

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/ex01.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\project\dictionary\resources\js\ex01.js */"./resources/js/ex01.js");


/***/ })

/******/ });
