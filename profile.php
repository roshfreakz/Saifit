<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("_header.html") ?>
    <script src="js/session.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="content-wrapper" class="content-wrapper">

            <?php require_once("_navbar.html") ?>

            <div id="content" class="sadhanaPick content">
                <div class="container-fluid">
                    <div class="head-title my-2">
                        <button class="btn btn-primary mr-3"><i class="fa fa-user"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Profile</h1>
                    </div>
                    <p>Sairam! I like to choose my Sadhanas</p>
                    <div id="accordion" class="accordion">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card border-left-primary shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center collapsed" data-toggle="collapse" href="#collapseOne">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-primary text-uppercase mb-1" id="Category1">

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chevron-down fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-hover table-bordered" id="tbl_Sadhana1">
                                                        <tr>
                                                            <td>Please wait!</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card border-left-success shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center collapsed" data-toggle="collapse" href="#collapseTwo">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-success text-uppercase mb-1" id="Category2">

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chevron-down fa-2x text-success"></i>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-hover table-bordered" id="tbl_Sadhana2">
                                                        <tr>
                                                            <td>Please wait!</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card border-left-info shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center collapsed" data-toggle="collapse" href="#collapseThree">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-info text-uppercase mb-1" id="Category3">

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chevron-down fa-2x text-info"></i>
                                            </div>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-hover table-bordered" id="tbl_Sadhana3">
                                                        <tr>
                                                            <td>Please wait!</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="card border-left-warning shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center collapsed" data-toggle="collapse" href="#collapseFour">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-warning text-uppercase mb-1" id="Category4">

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chevron-down fa-2x text-warning"></i>
                                            </div>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-hover table-bordered" id="tbl_Sadhana4">
                                                        <tr>
                                                            <td>Please wait!</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" onclick="SubmitSadhanaData()" id="btnSadhanaSubmit" disabled>Submit <i class="fa fa-check ml-2"></i> </button>
                </div>
            </div>
        </div>

        <?php require_once("_footer.html") ?>
    </div>

    <script src="js/profile.js"></script>

</body>

</html>