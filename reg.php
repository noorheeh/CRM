<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

   <?php 
   include 'header.php';
   ?>

   <div class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
          <p id="message" class="bg-danger"></p>
          <form  method="post">
            <div class="input-group mb-3">
              <input id="name" type="text" class="form-control" placeholder="Full name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <span>
              <p class="email_error_text bg-danger"></p>
            </span>
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control" placeholder="Email">
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
              <input id="password" type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input id="rePassword" type="password" class="form-control" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <span>
              <p class="password_error_text2 bg-danger"></p>
            </span>
            <button id="submit" type="submit" class="btn btn-primary btn-block">Register</button>
          </form>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<script type="text/javascript">
  $(document).ready(function () {
    $("#submit").click(function () {
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var rePassword = $("#rePassword").val();
      if (name.length=="" || email.length == "" || password.length == "" || rePassword.length == ""){
        $("#message").html("please fill out this field first").fadeIn();
        $("#message").addClass("error");
        return false;
      }else if (error_password !== false) {
        return false;
      }else{
        $.ajax({
          type: 'POST',
          url: 'signup_op.php',
          data: { name: name, email: email, password: password },
          success: function (feedback) {
            if(feedback == 1){
              $("#message").removeClass("bg-danger");
              $("#message").html("Added successfully").fadeIn();
              $("#message").addClass("error");
              $("#message").addClass("bg-success");
              $("#name").val('');
              $("#email").val('');
              $("#password").val('');
              $("#rePassword").val('');
            }else{
              $("#message").removeClass("bg-success");
              $("#message").html(feedback).fadeIn();
              $("#message").addClass("error");
              $("#message").addClass("bg-danger");
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
    $("#rePassword").focusout(function () {
      confirm_password();
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
        error_password = false;
      }
    }

    function confirm_password() {
      $("#message").hide();
      var password = $("#password").val();
      var confPassword = $("#rePassword").val();
      if (password !== confPassword) {
        $(".password_error_text2").html("Passwords not match");
        $(".password_error_text2").show();
        error_password = true;
      } else {
        $(".password_error_text2").hide();
        error_password = false;
      }
    }
  });
</script>

</body>
</html>
