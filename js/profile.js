
$(function() {

    $('#navprofile').removeClass('btn-primary').addClass('btn-warning');

    var jsonCategory = [];
    var jsonSadhana = [];

    $.ajax({
        url: domain + 'api/v1/category',
        method: 'GET',
        dataType: 'json',
        beforeSend: ShowLoadingFn
    }).done(function(result) {
        var jsonCategory = result.result.data.items;
        $('#Category1').text(jsonCategory[0].category);
        $('#Category2').text(jsonCategory[1].category);
        $('#Category3').text(jsonCategory[2].category);
        $('#Category4').text(jsonCategory[3].category);
        GetCategory(jsonCategory);
    }).always(function() {
        //HideLoadingFn();
    }).fail(function(result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });


    function GetCategory(jsonCategory) {
        $.ajax({
            url: domain + 'api/v1/sadhana?status=1',
            method: 'GET',
            dataType: 'json',
            beforeSend: ShowLoadingFn
        }).done(function(result) {
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
            GetMappedSadhanas();
        }).always(function() {
            HideLoadingFn();
        }).fail(function(result) {
            var err = JSON.parse(result.responseText);
            showNotify(err.result.message, 'danger');
        });
    }



});

var jsonSelectedSadhana = [];
var jsonUnselectedSadhana = [];

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

function GetMappedSadhanas() {
    $.ajax({
        url: domain + 'api/v1/user-sadhana/' + userData.user_id,
        method: 'GET',
        dataType: 'json',
        beforeSend: ShowLoadingFn
    }).done(function(result) {
        var jsonMappedSadhana = result.result.data;
        for (let i = 0; i < jsonMappedSadhana.length; i++) {
            $('#' + jsonMappedSadhana[i].sadhana_id).prop("checked", true);
        }
    }).always(function() {
        HideLoadingFn();
    }).fail(function(result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}


function GetUserSelectedSadhana(arg, cate) {
    //debugger;
    if ($(arg).prop('checked')) {
        var objarr = {
            user_id: userData.user_id,
            category_id: cate,
            sadhana_id: arg.id
        }
        jsonSelectedSadhana.push(objarr);
        var index = jsonUnselectedSadhana.indexOf(arg.id);
        if (index >= 0) jsonUnselectedSadhana.splice(index, 1);
    } else {
        var removeobjarr = {
            user_id: userData.user_id,
            sadhana_id: arg.id
        }
        jsonUnselectedSadhana.push(removeobjarr);
        var remindex = jsonSelectedSadhana.indexOf(arg.id);
        if (index >= 0) jsonSelectedSadhana.splice(remindex, 1);
    }
    console.log(jsonSelectedSadhana);
    console.log(jsonUnselectedSadhana);
    $('#btnSadhanaSubmit').prop("disabled", false);
}

function SubmitSadhanaData() {
    if (jsonSelectedSadhana.length > 0) MapUserSadhana();
    if (jsonUnselectedSadhana.length > 0) UnMapUserSadhana();
    showNotify("Your Sadhana has been successfully updated!", 'success');
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
    }).done(function(data) {
        //showNotify("Your Sadhanas has been successfully updated!", 'success');
        jsonSelectedSadhana = [];
    }).always(function() {
        HideLoadingFn();
    }).fail(function(result) {
        var err = JSON.parse(result.responseText);
        console.log(err.result);
        showNotify("Please Select Your Sadhana!", 'danger');
    });
}

function UnMapUserSadhana() {
    $.ajax({
        url: domain + 'api/v1/user-sadhana/map/remove',
        method: 'POST',
        dataType: 'json',
        data: ({
            mapping: jsonUnselectedSadhana
        }),
        beforeSend: ShowLoadingFn
    }).done(function(data) {
        //showNotify("Your Sadhanas has been successfully updated!", 'success');
        jsonUnselectedSadhana = [];
    }).always(function() {
        HideLoadingFn();
    }).fail(function(result) {
        var err = JSON.parse(result.responseText);
        console.log(err.result);
        showNotify("Error in Unselect Your Sadhana!", 'danger');
    });
}