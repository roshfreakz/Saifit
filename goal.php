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

    <script>
        var userData = JSON.parse(sessionStorage.getItem("userData"));
        // console.log(userData);
        if (userData == null) window.location.href = "login.html";
    </script>
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
                        <button class="btn btn-primary mr-3"><i class="fa fa-chart-line"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Goals</h1>
                    </div>
                    <div class="row" id="divSadhana">
                        <div class="col">
                            Sunday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                    aria-valuemax="100">10%</div>
                            </div>
                            Monday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                    aria-valuemax="100">20%</div>
                            </div>
                            Tuesday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                    aria-valuemax="100">30%</div>
                            </div>
                            Wednesday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100">40%</div>
                            </div>
                            Thursday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100">60%</div>
                            </div>
                            Friday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100">80%</div>
                            </div>
                            Saturday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100">100%</div>
                            </div>
                        </div>
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
            HideLoadingFn();
        });
    </script>
</body>

</html>