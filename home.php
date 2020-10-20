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
                        <button class="btn btn-primary mr-3"><i class="fa fa-home"></i></button>
                        <h1 class="h5 mb-0 text-gray-800">Home</h1>
                    </div>
                    <p>Sairam! Click on the Sadhanas to Complete </p>
                    <div class="row" id="divSadhana">
                        <div class="col">
                            <p>No Sadhanas Selected! <br> Please select your sadhanas from the profile tab!</p>
                        </div>
                    </div>
                    <button class="btn btn-success btn-block" onclick="DoCompleteSadhana()" id="btnCompleteSubmit" disabled>Done for the Day! </button>
                </div>
            </div>
        </div>

        <?php require_once("_footer.html") ?>

    </div>

    <script src="js/home.js"></script>

</body>

</html>