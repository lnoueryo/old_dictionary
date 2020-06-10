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

/***/ "./resources/js/jkeyboard.js":
/*!***********************************!*\
  !*** ./resources/js/jkeyboard.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;

(function ($, window, document, undefined) {
  // undefined is used here as the undefined global variable in ECMAScript 3 is
  // mutable (ie. it can be changed by someone else). undefined isn't really being
  // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
  // can no longer be modified.
  // window and document are passed through as local variable rather than global
  // as this (slightly) quickens the resolution process and can be more efficiently
  // minified (especially when both are regularly referenced in your plugin).
  // Create the defaults once
  var pluginName = "jkeyboard",
      defaults = {
    layout: "english",
    input: $('#input'),
    customLayouts: {
      selectable: []
    }
  };
  var function_keys = {
    backspace: {
      text: 'back'
    },
    "return": {
      text: 'Enter'
    },
    shift: {
      text: 'shift'
    },
    space: {
      text: 'space'
    },
    numeric_switch: {
      text: '123',
      command: function command() {
        this.createKeyboard('numeric');
        this.events();
      }
    },
    layout_switch: {
      text: '&nbsp;',
      command: function command() {
        var l = this.toggleLayout();
        this.createKeyboard(l);
        this.events();
      }
    },
    character_switch: {
      text: 'ABC',
      command: function command() {
        this.createKeyboard(layout);
        this.events();
      }
    },
    symbol_switch: {
      text: '#+=',
      command: function command() {
        this.createKeyboard('symbolic');
        this.events();
      }
    }
  };
  var layouts = {
    selectable: ['azeri', 'english', 'chinese'],
    azeri: [['q', 'ü', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'ö', 'ğ'], ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'ı', 'ə'], ['shift', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'ç', 'ş', 'backspace'], ['numeric_switch', 'layout_switch', 'space', 'return']],
    english: [['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p','ð','ʃ','ʒ','ʧ'], ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l','θ','ʌ','æ','ɑ'], ['shift', 'z', 'x', 'c', 'v', 'b', 'n', 'm','ɔ', 'ə', 'ː', 'backspace'], ['numeric_switch', 'layout_switch', 'space', 'return']],
    russian: [['й', 'ц', 'у', 'к', 'е', 'н', 'г', 'ш', 'щ', 'з', 'х','ʤ','ŋ',"ɛ"], ['ʊ','ʁ','ф', 'ы', 'в', 'а', 'п', 'р', 'о', 'л', 'д', 'ж', 'э'], ['shift', 'я', 'ч', 'с', 'м', 'и', 'т', 'ь', 'б', 'ю', 'backspace'], ['numeric_switch', 'layout_switch', 'space', 'return']],
    numeric: [['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'], ['-', '/', ':', ';', '(', ')', '$', '&', '@', '"'], ['symbol_switch', '.', ',', '?', '!', "'", 'backspace'], ['character_switch', 'layout_switch', 'space', 'return']],
    numbers_only: [['1', '2', '3'], ['4', '5', '6'], ['7', '8', '9'], ['0', 'return', 'backspace']],
    symbolic: [['[', ']', '{', '}', '#', '%', '^', '*', '+', '='], ['_', '\\', '|', '~', '<', '>'], ['numeric_switch', '.', ',', '?', '!', "'", 'backspace'], ['character_switch', 'layout_switch', 'space', 'return']],
    chinese: [['a', 'ā', 'á', 'ǎ', 'à', 'b', 'c', 'd', 'e', 'ē', 'é', 'ě', 'è', 'f'], ['g', 'h', 'i', 'ī', 'í', 'ǐ', 'ì', 'j', 'k', 'l', 'm', 'n', 'o', 'ō'], ['ó', 'ǒ', 'ò', 'p', 'q', 'r', 's', 't', 'u', 'ū', 'ú', 'ǔ', 'ù'],['numeric_switch', 'ü', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'w', 'x', 'y', 'z',"'", 'backspace'], ['character_switch', 'layout_switch', 'space', 'return']],
  };
  var shift = false,
      capslock = false,
      layout = 'english',
      layout_id = 0; // The actual plugin constructor

  function Plugin(element, options) {
    this.element = element; // jQuery has an extend method which merges the contents of two or
    // more objects, storing the result in the first object. The first object
    // is generally empty as we don't want to alter the default options for
    // future instances of the plugin

    this.settings = $.extend({}, defaults, options); // Extend & Merge the cusom layouts

    layouts = $.extend(true, {}, this.settings.customLayouts, layouts);

    if (Array.isArray(this.settings.customLayouts.selectable)) {
      $.merge(layouts.selectable, this.settings.customLayouts.selectable);
    }

    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  }

  Plugin.prototype = {
    init: function init() {
      layout = this.settings.layout;
      this.createKeyboard(layout);
      this.events();
    },
    createKeyboard: function createKeyboard(layout) {
      shift = false;
      capslock = false;
      var keyboard_container = $('<ul/>').addClass('jkeyboard'),
          me = this;
      layouts[layout].forEach(function (line, index) {
        var line_container = $('<li/>').addClass('jline');
        line_container.append(me.createLine(line));
        keyboard_container.append(line_container);
      });
      $(this.element).html('').append(keyboard_container);
    },
    createLine: function createLine(line) {
      var line_container = $('<ul/>');
      line.forEach(function (key, index) {
        var key_container = $('<li/>').addClass('jkey').data('command', key);

        if (function_keys[key]) {
          key_container.addClass(key).html(function_keys[key].text);
        } else {
          key_container.addClass('letter').html(key);
        }

        line_container.append(key_container);
      });
      return line_container;
    },
    events: function events() {
      var letters = $(this.element).find('.letter'),
          shift_key = $(this.element).find('.shift'),
          space_key = $(this.element).find('.space'),
          backspace_key = $(this.element).find('.backspace'),
          return_key = $(this.element).find('.return'),
          me = this,
          fkeys = Object.keys(function_keys).map(function (k) {
        return '.' + k;
      }).join(',');
      letters.on('click', function () {
        me.type(shift || capslock ? $(this).text().toUpperCase() : $(this).text());
      });
      space_key.on('click', function () {
        me.type(' ');
      });
      return_key.on('click', function () {
        me.type("\n");
        me.settings.input.parents('form').submit();
      });
      backspace_key.on('click', function () {
        me.backspace();
      });
      shift_key.on('click', function () {
        if (capslock) {
          me.toggleShiftOff();
          capslock = false;
        } else {
          me.toggleShiftOn();
        }
      }).on('dblclick', function () {
        capslock = true;
      });
      $(fkeys).on('click', function () {
        var command = function_keys[$(this).data('command')].command;
        if (!command) return;
        command.call(me);
      });
    },
    type: function type(key) {
      var input = this.settings.input,
          val = input.val(),
          input_node = input.get(0),
          start = input_node.selectionStart,
          end = input_node.selectionEnd;
      var max_length = $(input).attr("maxlength");

      if (start == end && end == val.length) {
        if (!max_length || val.length < max_length) {
          input.val(val + key);
        }
      } else {
        var new_string = this.insertToString(start, end, val, key);
        input.val(new_string);
        start++;
        end = start;
        input_node.setSelectionRange(start, end);
      }

      input.trigger('focus');

      if (shift && !capslock) {
        this.toggleShiftOff();
      }
    },
    backspace: function backspace() {
      var input = this.settings.input,
          val = input.val();
      input.val(val.substr(0, val.length - 1));
    },
    toggleShiftOn: function toggleShiftOn() {
      var letters = $(this.element).find('.letter'),
          shift_key = $(this.element).find('.shift');
      letters.addClass('uppercase');
      shift_key.addClass('active');
      shift = true;
    },
    toggleShiftOff: function toggleShiftOff() {
      var letters = $(this.element).find('.letter'),
          shift_key = $(this.element).find('.shift');
      letters.removeClass('uppercase');
      shift_key.removeClass('active');
      shift = false;
    },
    toggleLayout: function toggleLayout() {
      layout_id = layout_id || 0;
      var plain_layouts = layouts.selectable;
      layout_id++;
      var current_id = layout_id % plain_layouts.length;
      return plain_layouts[current_id];
    },
    insertToString: function insertToString(start, end, string, insert_string) {
      return string.substring(0, start) + insert_string + string.substring(end, string.length);
    }
  }; // A really lightweight plugin wrapper around the constructor,
  // preventing against multiple instantiations

  $.fn[pluginName] = function (options) {
    return this.each(function () {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName, new Plugin(this, options));
      }
    });
  };
})(jQuery, window, document);

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/jkeyboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\project\OTP\resources\js\jkeyboard.js */"./resources/js/jkeyboard.js");


/***/ })

/******/ });
