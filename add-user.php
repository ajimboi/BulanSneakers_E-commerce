<!DOCTYPE html>
<html lang="en">
<?php 
  $page  = "Add User";
  include('include/header.inc.php');
?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include('include/navbar.inc.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('include/sidebarnav.inc.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('include/pageheader.inc.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../functions/addUser.func.php" method="POST" id="registerUserForm">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="number" class="form-control" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option value="">Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>User Role</label>
                    <select class="form-control" name="role">
                        <option value="">Choose Role</option>
                        <option value="Member">Member</option>
                        <option value="Admin">Admin</option>
                    </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultError">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include('include/footer.inc.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $('#registerUserForm').validate({
    rules: {
        name: {
            required: true,
        },
        number: {
            required: true,
            number: true,
        },
        email: {
            required: true,
            email: true,
        },
        username: {
            required: true,
        },
        password: {
            required: true,
            minlength: 5
        },
        confirmpassword: {
            required: true,
            minlength: 5
        },
        gender: {
            required: true
        },
        role: {
            required: true
        },
    },
    messages: {
        name: {
            required: "Please enter a name",
        },
        number: {
            required: "Please enter a number",
            number: "Please enter a vaild number"
        },
        email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
        },
        username: {
            required: "Please enter a username",
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        confirmpassword: {
            required: "Please re-enter your password",
            minlength: "Your password must be at least 5 characters long"
        },
        gender: {
            required: "Please select a gender"
        },
        role: {
            required: "Please select a role"
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  switch (true) {
    case strpos($url, "error=all&empty&fields"):
      echo "toastr.error('Please Fill In All The Required Fields.')";
      break;
    case strpos($url, "error=empty&name"):
      echo "toastr.error('Please Fill In The Name.')";
      break;
    case strpos($url, "error=empty&phoneno"):
      echo "toastr.error('Please Fill In The Phone Number.')";
      break;
    case strpos($url, "rror=empty&email"):
      echo "toastr.error('Please Fill In The Email Address.')";
      break;
    case strpos($url, "error=empty&password"):
      echo "toastr.error('Please Fill In The Password.)";
      break;
    case strpos($url, "error=empty&cfpassword"):
      echo "toastr.error('Please Fill In The Confirm Password.')";
      break;
    case strpos($url, "error=empty&gender"):
      echo "toastr.error('Please Select A Gender.')";
      break;
    case strpos($url, "error=empty&role"):
      echo "toastr.error('Please Select A User Role.')";
      break;
    case strpos($url, "error=username&exist"):
      echo "toastr.error('Username Already Exist. Please Try Another Username.')";
      break;
    case strpos($url, "error=add&failed"):
      echo "toastr.error('Add User Failed. Please Try Again.')";
      break;
    case strpos($url, "error=add&success"):
      echo "toastr.success('Add User Successfully.')";
      break;
  }
  
  ?>

</script>
</body>
</html>
