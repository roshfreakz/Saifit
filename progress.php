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

            <div id="content" class="content">
                <div class="container-fluid">
                    <div class="head-title my-2">
                        <button class="btn btn-primary mr-3"><i class="fa fa-chart-line"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Progress</h1>
                    </div>
                    <p class="mb-2">Sairam! My Week's Progress</p>
                    <button class="btn btn-outline-primary">S</button>
                    <button class="btn btn-outline-primary">M</button>
                    <button class="btn btn-warning">T</button>
                    <button class="btn btn-outline-primary">W</button>
                    <button class="btn btn-outline-primary">T</button>
                    <button class="btn btn-outline-primary">F</button>
                    <button class="btn btn-outline-primary">S</button>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card border-primary shadow h-100">
                                <div class="card-body p-2">
                                    <div class="row" id="divProgress">
                                        <div class="col">
                                            <p>No Sadhanas Selected! <br> Please select your sadhanas from the profile tab!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mt-2">
                        <div class="col">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                    </div>                   -->
                </div>
            </div>
        </div>

        <?php require_once("_footer.html") ?>

    </div>

    <script src="js/progress.js"></script>

</body>

</html>