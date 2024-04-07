$(function () {
  $('.menu-btn').click(function (event) {
    event.preventDefault();
    $(this).toggleClass('is-open');
    $(this).siblings('.menu').toggleClass('is-open');
  });
});

//モーダル開く処理
$(function () {
  $("js-modal-open").click(function () {
    console.log(js - modal);
    $(js - modal).fadeIn();
  });
});

$(function () {
  //編集ボタン押した際の処理
  $('.js-modal-open').on('click', function () {
    $('js-modal').fadeIn();
    // 該当の投稿の内容を変数に格納
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    // 該当の内容をモーダルに渡す
    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });

  //背景部分や閉じるボタンを押した際の処理
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
