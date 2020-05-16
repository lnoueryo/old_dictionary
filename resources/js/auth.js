$(function() {

    $(".btn-square-soft").hover(function() {

      // カーソルが当たった時の処理
      $(this).css("background-color", "#fff");

    }, function() {

      // カーソルが離れた時の処理
      $(this).css("background-color", "#CCC");

    });
  });
