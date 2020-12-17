<?php 
session_start();
if (!empty($_SESSION["user"]) || !empty($_SESSION["admin"]))
  header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index2.html" class="h1"><b>CRM</b>Login</a>
      </div>
      <div class="card-body">

        <p id="message" class="bg-danger"></p>
        <span>
          <p class="email_error_text bg-danger"></p>
        </span>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span>
          <p class="password_error_text bg-danger"></p>
        </span>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" value="1" id="remember" onchange="toggleCheckbox(this)">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#submit").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();
        if (email.length == "" || password.length == ""){
          $("#message").html("please fill out this field first").fadeIn();
          $("#message").addClass("error");
          return false;
        }else {
          $.ajax({
            type: 'POST',
            url: 'login_op.php',
            data: { email: email, password: password },
            success: function (feedback) {
              if(feedback ==1){
                window.location.assign('index.php');
              }else{
                $("#message").html(feedback).fadeIn();
                $("#message").addClass("error");
              }
            }
          });
        }
      });
      $(".email_error_text").hide();
      $(".password_error_text").hide();
      var error_email = false;
      var error_password = false;
      $("#email").focusout(function () {
        check_email();
      });
      $("#password").focusout(function () {
        check_password();
      });
      function check_email() {
        $("#message").hide();
        var pattern = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/);
        if (pattern.test($("#email").val())) {
          $(".email_error_text").hide();
        } else {
          $(".email_error_text").html("Invalid email address");
          $(".email_error_text").show();
          error_email = true;
        }
      }
      function check_password() {
        $("#message").hide();
        var password_length = $("#password").val().length;
        if (password_length < 8) {
          $(".password_error_text").html("Should be at least 8 characters");
          $(".password_error_text").show();
          error_password = true;
        } else {
          $(".password_error_text").hide();
        }
      }
      
    });

      //check if cookies is enabled in browser
      function toggleCheckbox(element)
      {
  // when remmeber me enabled
  if(element.checked == true){
    // check if cookies enabled
    var cookieEnabled=(navigator.cookieEnabled)? true : false
    
//if not IE4+ nor NS6+
if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){ 
  document.cookie="testcookie"
  cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false
}
 //if cookies are enabled on client's browser
 if (!cookieEnabled){
  alert("Please enable cookies to activate this feature");
  element.checked = false;

} 
}
}
</script>
</body>
</html>
