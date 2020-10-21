<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("_header.html") ?>
    <script src="js/session.js"></script>
</head>

<body class="bg-gradient-primary">
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card shadow my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="text-primary mb-2">SAIFIT</h1>
                            <h1 class="h4 text-gray-900 mb-2">Change Password</h1>
                        </div>
                        <form id="changePassword">
                            <div class="form-group">
                                <label class="label-control">Old Password</label>
                                <input type="password" class="form-control" id="old_password" required>
                            </div>
                            <div class="form-group">
                                <label class="label-control">Password</label>
                                <input type="password" class="form-control" id="new_password" required>
                            </div>
                            <div class="form-group">
                                <label class="label-control">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" required>
                                <span class="invalid-feedback">Passwords Doesn't match!</span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block my-4">
                                Submit <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="loader" id="loader">
        <div class="overlay"></div>
        <i class="fa fa-spinner fa-pulse fa-3x text-primary"></i>
    </div>

    <script>
        
        $(function() {

            HideLoadingFn();

            $('#changePassword').on('submit', function(e) {
                e.preventDefault();
                var old_password = $('#old_password').val();
                var new_password = $('#new_password').val();
                var confirm_password = $('#confirm_password').val();
                if (new_password == confirm_password) {
                    var formData = {
                        user_id: userData.user_id,
                        old_password: old_password,
                        password: new_password
                    };
                    ChangePassword(formData);
                } else {
                    $('#confirm_password').addClass('is-invalid');
                }
            });
        });

        function ChangePassword(formData) {

            $.ajax({
                    url: domain + 'api/v1/user/resetpassword',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    beforeSend: ShowLoadingFn
                })
                .done(function(data) {
                    showNotify(data.result.message, 'success');
                    location.href = "home.php";
                })
                .always(function() {
                    HideLoadingFn();
                })
                .fail(function(result) {
                    var err = JSON.parse(result.responseText);
                    showNotify(err.result.message, 'danger');
                });
        }
    </script>

</body>

</html>