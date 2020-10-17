
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
    allow_dismiss: false,
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

$(function () {
  // HideLoadingFn();

  var jsonCategory = [];
  var jsonSadhana = [];

  $.ajax({
      url: domain + 'api/v1/category',
      method: 'GET',
      dataType: 'json',
      beforeSend: ShowLoadingFn
  }).done(function (result) {
      var jsonCategory = result.result.data.items;
      $('#Category1').text(jsonCategory[0].category);
      $('#Category2').text(jsonCategory[1].category);
      $('#Category3').text(jsonCategory[2].category);
      $('#Category4').text(jsonCategory[3].category);
      GetSadhanas(jsonCategory);
  }).always(function () {
      //HideLoadingFn();
  }).fail(function (result) {
      var err = JSON.parse(result.responseText);
      showNotify(err.result.message, 'danger');
  });


  function GetSadhanas(jsonCategory) {
      $.ajax({
          url: domain + 'api/v1/sadhana?status=1',
          method: 'GET',
          dataType: 'json',
          beforeSend: ShowLoadingFn
      }).done(function (result) {
          var jsonSadhana = result.result.data.items;
          var sadhana1 = [];
          var sadhana2 = [];
          var sadhana3 = [];
          var sadhana4 = [];
          for (let i = 0; i < jsonCategory.length; i++) {
              for (let j = 0; j < jsonSadhana.length; j++) {
                  if (jsonSadhana[j].category_id == jsonCategory[i]._id) {
                      if (i == 0) sadhana1.push(jsonSadhana[j]);
                      if (i == 1) sadhana2.push(jsonSadhana[j]);
                      if (i == 2) sadhana3.push(jsonSadhana[j]);
                      if (i == 3) sadhana4.push(jsonSadhana[j]);
                  }
              }

          }
          BindSadhana(sadhana1, 1);
          BindSadhana(sadhana2, 2);
          BindSadhana(sadhana3, 3);
          BindSadhana(sadhana4, 4);
      }).always(function () {
          HideLoadingFn();
      }).fail(function (result) {
          var err = JSON.parse(result.responseText);
          showNotify(err.result.message, 'danger');
      });
  }



});

var jsonSelectedSadhana = [];

function BindSadhana(data, arg) {
  var dhtml = '';
  for (let i = 0; i < data.length; i++) {
      dhtml += '<tr>';
      dhtml += '<td>';
      dhtml += '<div class="custom-control custom-checkbox">';
      dhtml += '<input type="checkbox" class="custom-control-input" id="' + data[i]._id +
          '" onchange="GetUserSelectedSadhana(this, \'' + data[i].category_id + '\')">';
      dhtml += '<label class="custom-control-label" for="' + data[i]._id + '">' + data[i].sadhana +
          '</label></div>';
      dhtml += '</td></tr>';
  }
  $('#tbl_Sadhana' + arg).html(dhtml);
}


function GetUserSelectedSadhana(arg, cate) {
  if ($(arg).prop('checked')) {
      var objarr = {
          user_id: userData.user_id,
          category_id: cate,
          sadhana_id: arg.id
      }
      jsonSelectedSadhana.push(objarr);
  } else {
      var index = jsonSelectedSadhana.indexOf(arg.id);
      jsonSelectedSadhana.splice(index, 1);
  }
  //console.log(jsonSelectedSadhana);
}


function MapUserSadhana() {
  $.ajax({
      url: domain + 'api/v1/user-sadhana/map',
      method: 'POST',
      dataType: 'json',
      data: ({
          mapping: jsonSelectedSadhana
      }),
      beforeSend: ShowLoadingFn
  }).done(function (data) {
      showNotify("Your Sadhanas has been successfully updated!", 'success');
      window.location.href = "home.html";
  }).always(function () {
      HideLoadingFn();
  }).fail(function (result) {
      var err = JSON.parse(result.responseText);
      console.log(err.result);
      showNotify("Please Select Your Sadhanas!", 'danger');
  });
}