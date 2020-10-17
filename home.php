<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Employee Monitor">
    <meta name="author" content="Roshan">
    <title>SAIFIT</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-notify.min.js"></script>
    <script src="js/main.js"></script>

</head>

<body>
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column content-wrapper">
            <nav class="navbar navbar-expand bg-white topbar static-top shadow">
                <!-- <a id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle" href="login.html">
                    <i class="fa fa-arrow-left"></i>
                </a> -->
                <div class="h3 font-weight-bold text-primary text-uppercase m-0">
                    SAIFIT</div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div id="content" class="mt-4">
                <div class="container-fluid">
                    <div class="head-title my-2">
                        <button class="btn btn-primary mr-3"><i class="fa fa-home"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Home</h1>
                    </div>
                    <p>Click the Sadhanas to Complete </p>
                    <div class="row" id="divSadhana">
                       
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-bar shadow">
              
                <div class="row">
                    <div class="col text-center">
                        <a href="profile.html">Profile</a>
                    </div>
                    <div class="col text-center">
                        <a href="home.html">Home</a>
                    </div>
                    <div class="col text-center">
                        <a href="goal.html">Goals</a>
                    </div>
                </div>
            </div>

            <div class="loader" id="loader">
                <div class="overlay"></div>
                <i class="fa fa-spinner fa-pulse fa-3x text-primary"></i>
            </div>
        </footer>
    </div>

    <script>
        $(function () {
            // HideLoadingFn();
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
                console.log(jsonSadhana)
                 BindSadhana(jsonSadhana);
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
                dhtml += ' <div class="col-6 mb-3">';
                dhtml += ' <div class="card shadow" onclick="DoActiveSadhana(this)">';
                dhtml += ' <div class="card-body">';
                dhtml += ' <h5 class="text-center">'+data[i].sadhana+'</h5>';
                dhtml += ' </div>';
                dhtml += ' </div>';
                dhtml += ' </div> ';
            }
            $('#divSadhana').html(dhtml);
        }


        function DoActiveSadhana(arg){
            if($(arg).hasClass('active'))  $(arg).removeClass('active');           
            else  $(arg).addClass('active');
        }
    </script>
</body>

</html>