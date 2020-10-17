<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("_header.html"); ?>
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center" id="divLogin">
      <div class="col-lg-6 col-md-12">
        <div class="card shadow my-5">
          <div class="card-body">
            <div class="text-center">
              <h1 class="text-primary mb-2">SAIFIT</h1>
              <h1 class="h4 text-gray-900 mb-2">Login</h1>
            </div>
            <form id="formLogin" action="index.html" method="POST">
              <div class="form-group">
                <label class="label-control">Email</label>
                <input type="email" class="form-control" name="user_id" required>
              </div>
              <div class="form-group">
                <label class="label-control">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block my-4"> Login <i class="fas fa-sign-in-alt"></i> </button>
            </form>
            <hr>
            <div class="text-center">
              <!-- <a class="small" href="#" onclick="ToggleScreen('forgot')">Forgot Password?</a> -->
            </div>
            <div class="text-center mt-3">
              Not an Existing User? <a href="#" onclick="ToggleScreen('register')">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center" id="divRegister" style="display: none;">
      <div class="col-lg-6 col-md-12">
        <div class="card shadow my-5">
          <div class="card-body">
            <div class="text-center">
              <h1 class="text-primary mb-2">SAIFIT</h1>
              <h1 class="h4 text-gray-900 mb-2">Create an Account!</h1>
            </div>
            <form id="formRegister">
              <div class="form-group">
                <label class="label-control">First Name</label>
                <input type="text" class="form-control" name="first_name" required>
              </div>
              <div class="form-group">
                <label class="label-control">Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
              </div>
              <div class="form-group">
                <label class="label-control">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label class="label-control">Mobile</label>
                <input type="text" class="form-control" name="mobile" required>
              </div>
              <div class="form-group">
                <label class="label-control">Gender</label>
                <select class="form-control" name="gender">
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label class="label-control">Date of Birth</label>
                <input type="date" class="form-control" name="dob" required>
              </div>
              <div class="form-group">
                <label class="label-control">Address</label>
                <textarea class="form-control" name="address" required></textarea>
              </div>
              <input type="hidden" name="age" value="20">
              <input type="hidden" name="device_id" value="0000">
              <input type="hidden" name="os" value="Android">
              <button type="submit" class="btn btn-primary btn-user btn-block my-4">
                Register <i class="fas fa-user-edit"></i>
              </button>
            </form>
            <hr>
            <div class="text-center mt-4">
              Already have an account? <a href="#" onclick="ToggleScreen('login')"> Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center" id="divForgot" style="display: none;">
      <div class="col-lg-6 col-md-12">
        <div class="card shadow my-5">
          <div class="card-body">
            <div class="text-center">
              <h1 class="text-primary mb-2">SAIFIT</h1>
              <h1 class="h4 text-gray-900 mb-2">Forgot Password?</h1>
            </div>
            <form id="divForgot">
              <div class="form-group">
                <label class="label-control" for="inpForEmail">Email</label>
                <input type="email" class="form-control" id="inpForEmail" name="inpForEmail" placeholder="Your Email" required>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block my-4">
                Submit <i class="fas fa-paper-plane"></i>
              </button>
            </form>
            <hr>
            <div class="text-center mt-4">
              Return to <a href="#" onclick="ToggleScreen('login')">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="loader" id="loader">
    <div class="overlay"></div>
    <i class="fa fa-spinner fa-pulse fa-3x text-primary"></i>
  </div>

  <script>
    function ToggleScreen(arg) {
      $('.form-control').val('');
      $('#divRegister').hide();
      $('#divForgot').hide();
      $('#divLogin').hide();
      if (arg == "register") {
        $('#divRegister').show();
      } else if (arg == "forgot") {
        $('#divForgot').show();
      } else {
        $('#divLogin').show();
      }
    }

    $(function() {

      sessionStorage.clear();

      HideLoadingFn();

      $('#formRegister').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        AddRegister(formData);
      })

      $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        CheckLogin(formData);
      })
    });

    function CheckLogin(formData) {
      return $.ajax({
          url: 'http://35.193.31.55/api/v1/user/login',
          method: 'POST',
          dataType: 'json',
          data: formData,
          beforeSend: ShowLoadingFn
        })
        .done(function(data) {
          showNotify(data.result.message, 'success');
          console.log(data.result.data);
          var userData = data.result.data;
          window.sessionStorage;
          sessionStorage.setItem("userData", JSON.stringify(userData));
          window.location.href = "home.php";
        })
        .always(function() {
          HideLoadingFn();
        })
        .fail(function(result) {
          var err = JSON.parse(result.responseText);
          showNotify(err.result.message, 'danger');
        });
    }


    function AddRegister(formData) {
      return $.ajax({
          url: 'http://35.193.31.55/api/v1/user/register',
          method: 'POST',
          dataType: 'json',
          data: formData,
          beforeSend: ShowLoadingFn
        })
        .done(function(data) {
          showNotify(data.result.message, 'success');
          ToggleScreen('login');
        })
        .always(function() {
          HideLoadingFn();
        })
        .fail(function(result) {
          var err = JSON.parse(result.responseText);
          showNotify(err.result.message, 'danger');
        });
    }
  </script>
</body>

</html>