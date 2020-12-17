<?php 
session_start();
if (empty($_SESSION["user"]))
  header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Customer</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'header.php';?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Customer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
              <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <p id="message" class="bg-danger"></p>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Customer Name</label>
                      <input type="name" class="form-control" id="name">
                    </div>
                    <span>
                      <p class="phone_error_number bg-danger"></p>
                    </span>
                    <div class="form-group">
                      <label >Phone Number</label>
                      <input id="phone" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Service Name</label>
                      <input id="service" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Problem</label>
                      <textarea id="problem" class="form-control" placeholder="Optional"></textarea>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#submit").click(function () {
      var name = $("#name").val();
      var phone = $("#phone").val();
      var service = $("#service").val();
      var problem = $("#problem").val();
      console.log(problem);
      if (name.length=="" || phone.length == "" || service.length == ""){
        $("#message").html("please fill out this field first").fadeIn();
        $("#message").addClass("error");
        return false;
      }else{
        $.ajax({
          type: 'POST',
          url: 'add_customer_op.php',
          data: { name: name, phone: phone, service: service, problem: problem },
          success: function (feedback) {
            if(feedback == 1){
              $("#message").removeClass("bg-danger");
              $("#message").html("Added successfully").fadeIn();
              $("#message").addClass("error");
              $("#message").addClass("bg-success");
              $("#name").val('');
              $("#phone").val('');
              $("#service").val('');
              $("#problem").val('');
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
    $(".phone_error_number").hide();
    var error_phoneNumber = false;
    $("#phone").focusout(function () {
      $("#message").hide();
      check_phoneNumber();
    });
    $("#phone").focus(function () {
      $("#message").hide();
    });
    $("#service").focus(function () {
      $("#message").hide();
    });


    function check_phoneNumber() {
      var pattern = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
      if (pattern.test($("#phone").val())) {
        $(".phone_error_number").hide();
      } else {
        $(".phone_error_number").html("Invalid phone number");
        $(".phone_error_number").show();
        error_phoneNumber = true;
      }
    }

  });
</script>
</body>
</html>
