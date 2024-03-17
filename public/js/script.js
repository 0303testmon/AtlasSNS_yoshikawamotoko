$(function () {
  $('.menu-btn').click(function (event) {
    event.preventDefault();
    $(this).toggleClass('is-open');
    $(this).siblings('.menu').toggleClass('is-open');
  });
});
