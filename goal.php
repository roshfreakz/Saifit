<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("_header.html"); ?>
    <?php require_once("_session.html") ?>
</head>

<body>
    <div id="wrapper">
        <div id="content-wrapper" class="content-wrapper">
            <?php require_once("_navbar.html"); ?>

            <div id="content" class="content">


                <div class="container-fluid">
                    <div class="head-title my-2">
                        <button class="btn btn-primary mr-3"><i class="fa fa-chart-line"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Goals</h1>
                    </div>
                    <div class="row" id="divSadhana">
                        <div class="col">
                            Sunday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                            </div>
                            Monday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                            </div>
                            Tuesday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                            </div>
                            Wednesday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                            </div>
                            Thursday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                            </div>
                            Friday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                            Saturday <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("_footer.html"); ?>
    </div>

    <script>
        $(function() {

            $('#navgoal').removeClass('btn-primary').addClass('btn-warning');

            HideLoadingFn();
        });
    </script>
</body>

</html>