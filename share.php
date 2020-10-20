<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("_header.html"); ?>
    <script src="js/vendor/html2canvas.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="content-wrapper" class="mt-2 mb-4">

            <div id="content" class="content">
                <div class="container-fluid">
                    <div class="head-title my-2">
                        <a class="btn btn-primary" href="goal.php"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card border-primary shadow h-100" id="capture">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                            <div class="logo-brand">
                                                <img class="img-logo" src="img/logo-small.png" alt="logo">
                                                <div class="logo-title">
                                                    <h4 class="font-weight-bold text-primary text-uppercase m-0">SAIFIT
                                                    </h4>
                                                    <p class="m-0">Your Sadhana Tracker </p>
                                                </div>
                                            </div>
                                            <img class="img-fluid mt-4" src="img/sai2.jpg" alt="">
                                            <p class="mt-2">Bangaru,
                                                <br> Your Sadhana Miles Today is Excellent! <br>
                                                Samastha Lokah Sukhino Bhavantu! <br>
                                                May All Beings in the Worlds be Happy! </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a class="btn btn-success" id="whatsapp" target="_blank" href="#"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-primary" id="facebook" target="_blank" href="#"><i class="fab fa-facebook"></i></a>
                            <a class="btn btn-danger" id="instagram" target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-info" id="twitter" target="_blank" href="#"> <i class="fab fa-twitter"></i></a>
                            <a class="btn btn-warning" id="download" href="#"> <i class="fa fa-download"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="loader" id="loader">
                <div class="overlay"></div>
                <i class="fa fa-spinner fa-pulse fa-3x text-primary"></i>
            </div>
        </footer>
    </div>

    <script>
        $(function() {
            HideLoadingFn();

            html2canvas(document.querySelector("#capture")).then(canvas => {
                var imageData = canvas.toDataURL("image/png");
                var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
                var whatsapp = $('#whatsapp');
                $("#download").attr("download", "image.png").attr("href", newData);
                $("#whatsapp").attr("data-action", "share/whatsapp/share").attr("href",
                    "whatsapp://send?text=hello");
                $("#facebook").attr("href", "https://facebook.com");
                $("#instagram").attr("href", "https://instgram.com");
                $("#twitter").attr("href", "https://twitter.com");

            });

        });
    </script>
</body>

</html>