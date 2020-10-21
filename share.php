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
                                            <img class="img-fluid mt-4" id="saiimg" src="" alt="Sai">
                                            <p class="mt-2">Bangaru,
                                                <br>
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
                            <!-- <a class="btn btn-danger" id="instagram" target="_blank" href="#"><i class="fab fa-instagram"></i></a> -->
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
            var i = Math.floor((Math.random() * 30) + 1);
            var imgPath = "img/share/sai (" + i + ").png";
            $('#saiimg').attr('src', imgPath);

            $('#saiimg').on('load', function() {
                ConvertImage();
            });

        });

        function ConvertImage() {
            html2canvas(document.querySelector("#capture")).then(canvas => {
                var imageData = canvas.toDataURL("image/jpeg");
                $.ajax({
                    url: 'postfile.php',
                    type: "POST",
                    dataType: 'text',
                    data: {
                        base64data: imageData
                    },
                    success: function(result) {
                        ShareDetails(result);
                        HideLoadingFn();
                    }
                })
            });
        }

        function ShareDetails(result) {
            var file = window.location.hostname +"/img/user/" + result;
            $("#download").attr("download", result).attr("href", file);
            $("#whatsapp").attr("href", "https://api.whatsapp.com/send?text=" + file).attr('data-action', 'share/whatsapp/share');
            $("#facebook").attr("href", "https://facebook.com/sharer.php?u="+file);
            // $("#instagram").attr("href", "https://instagram.com");
            $("#twitter").attr("href", "https://twitter.com/share?url="+file);
        }
    </script>
</body>

</html>