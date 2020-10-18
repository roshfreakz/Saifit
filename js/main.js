
var domain = "http://35.193.31.55/";

function ShowLoadingFn() {
  $('#loader').show();
}

function HideLoadingFn() {
  setTimeout(function () {
    $('#loader').hide();
  }, 1000);
}

function showNotify(msg, type) {
  $.notify({
    message: msg
  }, {
    type: type,
    allow_dismiss: true,
    template: '<div data-notify="container" class="notify alert alert-{0}" role="alert">' +
      '<span data-notify="title">{1}</span>' +
      '<span data-notify="message">{2}</span>' +
      '</div>'
  });
}

var objday = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
  "Sunday"
];
var mdate = new Date();
var dateString = mdate.getUTCFullYear() + "-" + (mdate.getUTCMonth() + 1) + "-" + mdate.getUTCDate();
var daystring = objday[mdate.getUTCDay()];
