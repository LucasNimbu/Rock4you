$(document).ready(function() {

  var nav = $('#container-menu-fixo');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 140) {
      nav.slideDown('30');
    } else {
      nav.slideUp('30');
    }
  });
});

function scrollDiv(dir, px, num) {
  var nomescroller = 'scroller'+num;
  var scroller = document.getElementById(nomescroller);
  if (dir == 'r') {
    scroller.scrollLeft -= px;
  }
  else if (dir == 'l') {
    scroller.scrollLeft += px;
  }
}
