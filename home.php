<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("_header.html") ?>
    <?php require_once("_session.html") ?>
</head>

<body>
    <div id="wrapper">
        <div id="content-wrapper" class="content-wrapper">
            <?php require_once("_navbar.html"); ?>

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
        <?php require_once("_footer.html"); ?>

    </div>

    <script>
        $(function() {
            GetSadhanas();
            $('#navhome').removeClass('btn-primary').addClass('btn-warning');
        });

        function GetSadhanas() {
            $.ajax({
                url: domain + 'api/v1/user-sadhana/' + userData.user_id,
                method: 'GET',
                dataType: 'json',
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var jsonSadhana = result.result.data;
                if (jsonSadhana.length > 0) {
                    BindSadhana(jsonSadhana);
                    $('#navhome').prop('disabled', false);
                } else {
                    location.href = "profile.php";
                }
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });
        }

        function BindSadhana(data) {
            var dhtml = '';
            for (let i = 0; i < data.length; i++) {
                dhtml += ' <div class="col-12 mb-3">';
                dhtml += ' <div class="card shadow" data-sadhana="' + data[i].sadhana_id + '" data-category="' + data[i].category_id + '" onclick="DoActiveSadhana(this)">';
                dhtml += ' <div class="card-body">';
                dhtml += ' <h5 class="text-center textholder">' + data[i].sadhana + '</h5>';
                dhtml += ' </div>';
                dhtml += ' </div>';
                dhtml += ' </div> ';
            }
            $('#divSadhana').html(dhtml);
        }


        function DoActiveSadhana(arg) {
            var mdate = new Date();
            var dateString = mdate.getUTCFullYear() + "-" + (mdate.getUTCMonth() + 1) + "-" + mdate.getUTCDate();

            var sadhanaData = [];
            var mSadhana = {
                sadhana_id: $(arg).attr('data-sadhana'),
                category_id: $(arg).attr('data-category')
            }
            sadhanaData.push(mSadhana);
            var objarr = {
                user_id: userData.user_id,
                sadhana: sadhanaData,
                track_date: dateString
            }

            if ($(arg).hasClass('active')){
                $(arg).removeClass('active');
                DoUnTrackSadhana(objarr);
            } 
            else {
                $(arg).addClass('active');
                DoTrackSadhana(objarr);
            }
        }

        function DoTrackSadhana(datastr) {
            $.ajax({
                url: domain + 'api/v1/user-sadhana-track/map',
                method: 'POST',
                dataType: 'json',
                data: datastr,
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var resdata = result.result.data;
                console.log(resdata);
                showNotify("Your Sadhanas has been successfully Completed!", 'success');
                $('#btnCompleteSubmit').prop('disabled', false);
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });
        }


        function DoUnTrackSadhana(datastr) {
            $.ajax({
                url: domain + 'api/v1/user-sadhana-track/unmap',
                method: 'POST',
                dataType: 'json',
                data: datastr,
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var resdata = result.result.data;
                console.log(resdata);
                showNotify("Your Sadhanas has been successfully Uncompleted!", 'success');
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });
        }

        
        function DoCompleteSadhana() {
            var mdate = new Date();
            var dateString = mdate.getUTCFullYear() + "-" + (mdate.getUTCMonth() + 1) + "-" + mdate.getUTCDate();

            $.ajax({
                url: domain + 'api/v1/user-sadhana-track/complete',
                method: 'POST',
                dataType: 'json',
                data: {
                    user_id: userData.user_id,
                    track_date: dateString
                },
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var resdata = result.result.data;
                console.log(resdata);
                showNotify("Your have completed your day!", 'success');
                location.href = "goal.php";
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