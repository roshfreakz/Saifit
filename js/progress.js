$(function () {
    GetSadhanas();
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
        dhtml += ' <div class="col-12 mb-2">';
        dhtml += ' <div class="card shadow">';
        if (i % 2 != 0)
            dhtml += ' <div class="card-body p-2">';
        else
            dhtml += ' <div class="card-body bg-success text-white p-2">';
        dhtml += ' <p class="m-0">' + data[i].sadhana + '</p>';
        dhtml += ' </div>';
        dhtml += ' </div>';
        dhtml += ' </div> ';
    }
    $('#divProgress').html(dhtml);
    // GetTrackedSadhanas();
}