

$(function () {
  $('.sidebar li.nav-item a.nav-link').removeClass('active');
  // console.log(location.pathname.split("/")[2]);
  if (location.pathname.split("/")[2]) {
    $('.sidebar li.nav-item a.nav-link[href="' + location.pathname.split("/")[2] + '"]').addClass('active');
  }else{
    $('.sidebar li.nav-item a.nav-link[href="index.php"]').addClass('active');
  }
})