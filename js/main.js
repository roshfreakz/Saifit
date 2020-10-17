
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
    placement: {
      from: "bottom",
      align: 'left'
    },
    template: '<div data-notify="container" class="notify alert alert-{0}" role="alert">' +
      '<span data-notify="title">{1}</span>' +
      '<span data-notify="message">{2}</span>' +
      '</div>'
  });
}
