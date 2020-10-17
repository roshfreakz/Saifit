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
    </div>
    <?php require_once("_footer.html"); ?>
    <script>
        $(function() {

            $('#navprofile').removeClass('btn-primary').addClass('btn-warning');

            var jsonCategory = [];
            var jsonSadhana = [];

            $.ajax({
                url: domain + 'api/v1/category',
                method: 'GET',
                dataType: 'json',
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var jsonCategory = result.result.data.items;
                $('#Category1').text(jsonCategory[0].category);
                $('#Category2').text(jsonCategory[1].category);
                $('#Category3').text(jsonCategory[2].category);
                $('#Category4').text(jsonCategory[3].category);
                GetCategory(jsonCategory);
            }).always(function() {
                //HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });


            function GetCategory(jsonCategory) {
                $.ajax({
                    url: domain + 'api/v1/sadhana?status=1',
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: ShowLoadingFn
                }).done(function(result) {
                    var jsonSadhana = result.result.data.items;
                    var sadhana1 = [];
                    var sadhana2 = [];
                    var sadhana3 = [];
                    var sadhana4 = [];
                    for (let i = 0; i < jsonCategory.length; i++) {
                        for (let j = 0; j < jsonSadhana.length; j++) {
                            if (jsonSadhana[j].category_id == jsonCategory[i]._id) {
                                if (i == 0) sadhana1.push(jsonSadhana[j]);
                                if (i == 1) sadhana2.push(jsonSadhana[j]);
                                if (i == 2) sadhana3.push(jsonSadhana[j]);
                                if (i == 3) sadhana4.push(jsonSadhana[j]);
                            }
                        }
                    }
                    BindSadhana(sadhana1, 1);
                    BindSadhana(sadhana2, 2);
                    BindSadhana(sadhana3, 3);
                    BindSadhana(sadhana4, 4);
                    GetMappedSadhanas();
                }).always(function() {
                    HideLoadingFn();
                }).fail(function(result) {
                    var err = JSON.parse(result.responseText);
                    showNotify(err.result.message, 'danger');
                });
            }



        });

        var jsonSelectedSadhana = [];
        var jsonUnselectedSadhana = [];

        function BindSadhana(data, arg) {
            var dhtml = '';
            for (let i = 0; i < data.length; i++) {
                dhtml += '<tr>';
                dhtml += '<td>';
                dhtml += '<div class="custom-control custom-checkbox">';
                dhtml += '<input type="checkbox" class="custom-control-input" id="' + data[i]._id +
                    '" onchange="GetUserSelectedSadhana(this, \'' + data[i].category_id + '\')">';
                dhtml += '<label class="custom-control-label" for="' + data[i]._id + '">' + data[i].sadhana +
                    '</label></div>';
                dhtml += '</td></tr>';
            }
            $('#tbl_Sadhana' + arg).html(dhtml);

        }

        function GetMappedSadhanas() {
            $.ajax({
                url: domain + 'api/v1/user-sadhana/' + userData.user_id,
                method: 'GET',
                dataType: 'json',
                beforeSend: ShowLoadingFn
            }).done(function(result) {
                var jsonMappedSadhana = result.result.data;
                for (let i = 0; i < jsonMappedSadhana.length; i++) {
                    $('#' + jsonMappedSadhana[i].sadhana_id).prop("checked", true);
                }
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                showNotify(err.result.message, 'danger');
            });
        }


        function GetUserSelectedSadhana(arg, cate) {
            //debugger;
            if ($(arg).prop('checked')) {
                var objarr = {
                    user_id: userData.user_id,
                    category_id: cate,
                    sadhana_id: arg.id
                }
                jsonSelectedSadhana.push(objarr);
                var index = jsonUnselectedSadhana.indexOf(arg.id);
                if (index >= 0) jsonUnselectedSadhana.splice(index, 1);
            } else {
                var removeobjarr = {
                    user_id: userData.user_id,
                    sadhana_id: arg.id
                }
                jsonUnselectedSadhana.push(removeobjarr);
                var remindex = jsonSelectedSadhana.indexOf(arg.id);
                if (index >= 0) jsonSelectedSadhana.splice(remindex, 1);
            }
            console.log(jsonSelectedSadhana);
            console.log(jsonUnselectedSadhana);
            $('#btnSadhanaSubmit').prop("disabled", false);
        }

        function SubmitSadhanaData() {
            if (jsonSelectedSadhana.length > 0) MapUserSadhana();
            if (jsonUnselectedSadhana.length > 0) UnMapUserSadhana();
            showNotify("Your Sadhanas has been successfully updated!", 'success');
        }


        function MapUserSadhana() {
            $.ajax({
                url: domain + 'api/v1/user-sadhana/map',
                method: 'POST',
                dataType: 'json',
                data: ({
                    mapping: jsonSelectedSadhana
                }),
                beforeSend: ShowLoadingFn
            }).done(function(data) {
                //showNotify("Your Sadhanas has been successfully updated!", 'success');
                jsonSelectedSadhana = [];
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                console.log(err.result);
                showNotify("Please Select Your Sadhanas!", 'danger');
            });
        }

        function UnMapUserSadhana() {
            $.ajax({
                url: domain + 'api/v1/user-sadhana/map/remove',
                method: 'POST',
                dataType: 'json',
                data: ({
                    mapping: jsonUnselectedSadhana
                }),
                beforeSend: ShowLoadingFn
            }).done(function(data) {
                //showNotify("Your Sadhanas has been successfully updated!", 'success');
                jsonUnselectedSadhana = [];
            }).always(function() {
                HideLoadingFn();
            }).fail(function(result) {
                var err = JSON.parse(result.responseText);
                console.log(err.result);
                showNotify("Error in Unselect Your Sadhanas!", 'danger');
            });
        }
    </script>
</body>

</html>