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

  $(document).on("click", ".add", function() {
      $(this).parent().clone(true).insertAfter($(this).parent());
  });
  $(document).on("click", ".del", function() {
      var target = $(this).parent();
      if (target.parent().children().length > 1) {
          target.remove();
      }
  });

  $('#myImage').on('change', function (e) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $("#preview").attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
  });


//   var music = new Audio();
//     function init() {
//       music.preload = "auto";
//       music.src = "./mymusic.mp3";
//       music.load();

//       music.addEventListener("ended", function () {
//         music.currentTime = 0;
//         music.play();
//       }, false);
//     }

//     function play() {
//       music.loop = true;
//       music.play();
//     }

//     function stop() {
//       music.pause();
//       music.currentTime = 0;
//     }

//     init();

//     function audio_play() {
//       audio.play();
//    }

//    function audio_pause() {
//       audio.pause();
//    }

   $(function(){
    $('#js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});

$(function () {
    $(".btn-square-soft").hover(function () {
      // カーソルが当たった時の処理
      $(this).css("background-color", "#fff");
    }, function () {
      // カーソルが離れた時の処理
      $(this).css("background-color", "#CCC");
    });
  });

  document.getElementById("sound").onchange=function(e){
    var fileObj = e.target.files[0];
    var objectURL = window.URL.createObjectURL(fileObj);

    var audio = new Audio();
    audio.src=objectURL;
    audio.play();
    }

  /**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
