$(function () {
    $('#js-modal-open').on('click', function () {
      $('.js-modal').fadeIn();
      return false;
    });
    $('.js-modal-close').on('click', function () {
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

  window.onload = function () {
      var popup = document.getElementById('js-popup');
      if (!popup) return;
      popup.classList.add('is-show');
      var blackBg = document.getElementById('js-black-bg');
      var closeBtn = document.getElementById('js-close-btn');
      closePopUp(blackBg);
      closePopUp(closeBtn);

      function closePopUp(elem) {
        if (!elem) return;
        elem.addEventListener('click', function () {
          popup.classList.remove('is-show');
        });
      }
    };
