$(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 40) {
      $('#wrapper').addClass('fixed');
    } else {
      $('#wrapper').removeClass('fixed');
    }
  });
});