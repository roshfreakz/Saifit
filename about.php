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
                        <a class="btn btn-primary" href="home.php"><i class="fa fa-arrow-left"></i> Back</a>
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
                                            <img class="img-fluid mt-4" src="img/sai2.jpg" alt="Sai">
                                            <p class="text-justify mt-2">Loving Sai Ram,
                                                <br>
                                                <br>
                                                &nbsp; &nbsp; &nbsp; SaiFit- Your Sadhana Tracker lists the possible Sadhanas under four categories based on the 9 Point Code of Conduct. Similar to building muscle memory, to organize the daily activities and eventually help plan a day.
                                                <br>
                                                <br>
                                                As Swami says, all work is My work. This list is only to display the possible Sadhanas a Sadhak can undertake and keep track of, it could be providing more options to some, it could cover everything that a Sadhak is already committed to offering. This is not a reminder to show how much or how less a Sadhak is offering but to simply break down Practical Spirituality on a daily basis and encouraging all work to be offered to Swami.
                                                <br><br>
                                                The App encourages Sadhaks to come back to this list everyday as motivation to continue and if possible add more. It is simple easy to do daily activities without feeling the pressure to achieve, channelizing the purity in offering.
                                                <br> <br>
                                                Ultimately the by-products of regular honest Sadhanas are becoming calmer, less agitated, how to better handle Rajasic qualities-anger, irritation, becoming more discipline, more responsible, committed and driven from within and not due to external factors etc. Motivation through sharing the illustration and becoming messengers innately.
                                                <br> <br>
                                                Everyday activities performed and offered with purity in thought, word and deed with understanding. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        })
    </script>

</body>

</html>