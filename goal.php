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
                        <h1 class="h5 mb-0 text-gray-800">Goals</h1>
                    </div>
                    <p class="mb-2">Sairam! Track your progress here</p>
                    <button class="btn btn-outline-warning">
                        <script>
                            document.write(dateString);
                        </script>
                    </button>
                    <button class="btn btn-outline-info">
                        <script>
                            document.write(daystring);
                        </script>
                    </button>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card border-primary shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <img class="img-fluid" src="img/wining.gif" alt="">
                                            <div class="font-weight-bold text-center mt-2">
                                                Your Total Score is: <span class="text-success font-weight-bold h3" id="lblscore"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a class="btn btn-warning btn-block" href="share.php">Share <i class="fa fa-share"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("_footer.html") ?>

    </div>

    <script>
        $(function() {
            GetRank();
            $('#navgoal').removeClass('btn-primary').addClass('btn-warning');
        });

        function GetRank() {
            $.ajax({
                url: domain + 'api/v1/user-sadhana-track/rank',
                method: 'GET',
                dataType: 'json',
                data: {
                    user_id: userData.user_id,
                    track_date: dateString
                },
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var jsonData = result.result.data;
                console.log(jsonData)
                $('#lblscore').text(jsonData.totalRank);
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });
        }
    </script>
</body>

</html>