if (localStorage.getItem("userData") != null) {
    location.href = "home.php";
}

function ToggleScreen(arg) {
    $('.form-control').val('');
    $('#divRegister').hide();
    $('#divForgot').hide();
    $('#divLogin').hide();
    if (arg == "register") {
        $('#divRegister').show();
    } else if (arg == "forgot") {
        $('#divForgot').show();
    } else {
        $('#divLogin').show();
    }
}

$(function () {

    HideLoadingFn();

    $('#formRegister').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        AddRegister(formData);
    });

    $('#formLogin').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        CheckLogin(formData);
    });

    $('#forgotPassword').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        ForgotPassword(formData);
    });

});


function CheckLogin(formData) {
    $.ajax({
            url: domain + 'api/v1/user/login',
            method: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: ShowLoadingFn
        })
        .done(function (data) {
            showNotify(data.result.message, 'success');
            var userData = data.result.data;
            localStorage.setItem("userData", JSON.stringify(userData));
            if (userData.is_first_time_login) {
                location.href = "changepassword.php";
            } else {
                location.href = "home.php";
            }
        })
        .always(function () {
            HideLoadingFn();
        })
        .fail(function (result) {
            var err = JSON.parse(result.responseText);
            showNotify(err.result.message, 'danger');
        });
}

function AddRegister(formData) {
    $.ajax({
            url: domain + 'api/v1/user/register',
            method: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: ShowLoadingFn
        })
        .done(function (data) {
            showNotify(data.result.message, 'success');
            ToggleScreen('login');
        })
        .always(function () {
            HideLoadingFn();
        })
        .fail(function (result) {
            var err = JSON.parse(result.responseText);
            showNotify(err.result.message, 'danger');
        });
}

function ForgotPassword(formData) {
    $.ajax({
            url: domain + 'api/v1/user/forgetpassword',
            method: 'POST',
            dataType: 'json',
            data: formData,
            beforeSend: ShowLoadingFn
        })
        .done(function (data) {
            showNotify(data.result.message, 'success');
            ToggleScreen('login');
        })
        .always(function () {
            HideLoadingFn();
        })
        .fail(function (result) {
            var err = JSON.parse(result.responseText);
            showNotify(err.result.message, 'danger');
        });
}
