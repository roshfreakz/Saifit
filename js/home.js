$(function () {
    GetSadhanas();
    $('#navhome').removeClass('btn-primary').addClass('btn-warning');
});

function GetSadhanas() {
    $.ajax({
        url: domain + 'api/v1/user-sadhana/' + userData.user_id,
        method: 'GET',
        dataType: 'json',
        beforeSend: ShowLoadingFn
    }).done(function (result) {
        var jsonSadhana = result.result.data;
        if (jsonSadhana.length > 0) {
            BindSadhana(jsonSadhana);
        } else {
            location.href = "profile.php";
        }
    }).always(function () {
        HideLoadingFn();
    }).fail(function (result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}

function BindSadhana(data) {
    var dhtml = '';
    for (let i = 0; i < data.length; i++) {
        dhtml += ' <div class="col-12 mb-3">';
        dhtml += ' <div class="card shadow" id="' + data[i].sadhana_id + '" data-sadhana="' + data[i].sadhana_id + '" data-category="' + data[i]
            .category_id + '" onclick="DoActiveSadhana(this)">';
        dhtml += ' <div class="card-body">';
        dhtml += ' <h5 class="text-center textholder">' + data[i].sadhana + '</h5>';
        dhtml += ' </div>';
        dhtml += ' </div>';
        dhtml += ' </div> ';
    }
    $('#divSadhana').html(dhtml);
    GetTrackedSadhanas();
}


function DoActiveSadhana(arg) {
    var mdate = new Date();
    var dateString = mdate.getUTCFullYear() + "-" + (mdate.getUTCMonth() + 1) + "-" + mdate.getUTCDate();

    var sadhanaData = [];
    var mSadhana = {
        sadhana_id: $(arg).attr('data-sadhana'),
        category_id: $(arg).attr('data-category')
    }
    sadhanaData.push(mSadhana);
    var objarr = {
        user_id: userData.user_id,
        sadhana: sadhanaData,
        track_date: dateString
    }

    if ($(arg).hasClass('active')) {
        $(arg).removeClass('active');
        DoUnTrackSadhana(objarr);
    } else {
        $(arg).addClass('active');
        DoTrackSadhana(objarr);
    }
}

function GetTrackedSadhanas() {
    $.ajax({
        url: domain + 'api/v1/user-sadhana-track',
        method: 'GET',
        dataType: 'json',
        data: {
            user_id: userData.user_id,
            track_date: dateString
        },
        beforeSend: ShowLoadingFn
    }).done(function (result) {
        var jsonResult = result.result.data.sadhana;
        console.log(jsonResult);
        if (jsonResult.length > 0) {
            for (let i = 0; i < jsonResult.length; i++) {
                $('#' + jsonResult[i].sadhana_id).addClass("active");
            }
        }
    }).always(function () {
        HideLoadingFn();
    }).fail(function (result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}

function DoTrackSadhana(datastr) {
    $.ajax({
        url: domain + 'api/v1/user-sadhana-track/map',
        method: 'POST',
        dataType: 'json',
        data: datastr,
        beforeSend: ShowLoadingFn
    }).done(function (result) {
        var resdata = result.result.data;
        console.log(resdata);
        // showNotify("Your Sadhana has been successfully Completed!", 'success');
        $('#btnCompleteSubmit').prop('disabled', false);
    }).always(function () {
        HideLoadingFn();
    }).fail(function (result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}


function DoUnTrackSadhana(datastr) {
    $.ajax({
        url: domain + 'api/v1/user-sadhana-track/unmap',
        method: 'POST',
        dataType: 'json',
        data: datastr,
        beforeSend: ShowLoadingFn
    }).done(function (result) {
        var resdata = result.result.data;
        console.log(resdata);
        // showNotify("Selected Sadhana has been Reverted!", 'warning');
    }).always(function () {
        HideLoadingFn();
    }).fail(function (result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}


function DoCompleteSadhana() {
    var mdate = new Date();
    var dateString = mdate.getUTCFullYear() + "-" + (mdate.getUTCMonth() + 1) + "-" + mdate.getUTCDate();

    $.ajax({
        url: domain + 'api/v1/user-sadhana-track/complete',
        method: 'POST',
        dataType: 'json',
        data: {
            user_id: userData.user_id,
            track_date: dateString
        },
        beforeSend: ShowLoadingFn
    }).done(function (result) {
        var resdata = result.result.data;
        console.log(resdata);
        showNotify("Your have completed your day!", 'success');
        location.href = "goal.php";
    }).always(function () {
        HideLoadingFn();
    }).fail(function (result) {
        var err = JSON.parse(result.responseText);
        showNotify(err.result.message, 'danger');
    });
}