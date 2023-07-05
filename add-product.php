<!DOCTYPE html>
<html lang="en">
<?php 
  $page  = "Add Product";
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../functions/addProduct.func.php" method="POST" id="addProductForm" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter product code">
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name">
                    </div>
                        
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter product price">
                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter product quantity">
                    </div>
                    <div class="form-group">
                        <label>Product Size</label>
                        <input type="text" name="size" class="form-control" placeholder="Enter product size">
                    </div>

                    <div class="form-group">
                        <label>Upload Product Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="product_image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultError">Add Product</button>
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $('#addProductForm').validate({
    rules: {
        code: {
            required: true,
        },
        name: {
            required: true,
        },
        price: {
            required: true,
            number: true,
        },
        quantity: {
            required: true,
            number: true,
        },
        size: {
            required: true,
            number: true,
        },
    },
    messages: {
        code: {
            required: "Please enter a product code",
        },
        name: {
            required: "Please enter a product name",
        },
        price: {
            required: "Please enter a product price",
            number: "Please enter a vaild number"
        },
        quantity: {
            required: "Please enter a product quantity",
            number: "Please enter a vaild number"
        },
        size: {
            required: "Please enter a product size",
            number: "Please enter a vaild number"
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
    case strpos($url, "error=empty&code"):
      echo "toastr.error('Please Fill In The Product Code.')";
      break;
    case strpos($url, "error=empty&name"):
      echo "toastr.error('Please Fill In The Product Name.')";
      break;
    case strpos($url, "error=empty&price"):
      echo "toastr.error('Please Fill In The Product Price.')";
      break;
    case strpos($url, "error=empty&password"):
      echo "toastr.error('Please Fill In The Password.)";
      break;
    case strpos($url, "error=empty&quantity"):
      echo "toastr.error('Please Fill In The Product Quantity.')";
      break;
    case strpos($url, "error=empty&size"):
      echo "toastr.error('Please Fill In The Product Size.')";
      break;
    case strpos($url, "error=invalid&image"):
      echo "toastr.error('Please Select A Valid Image.')";
      break;
    case strpos($url, "error=invalid&image&type"):
      echo "toastr.error('Please Select A Valid Image Type.')";
      break;
    case strpos($url, "error=upload&image&failed"):
      echo "toastr.error('Upload Image Failed. Please Try Again.')";
      break;
    case strpos($url, "error=add&product&failed"):
      echo "toastr.success('Add Product Failed. Please Try Again')";
      break;
    case strpos($url, "success=add&product&success"):
      echo "toastr.success('Add Product Successfully.')";
      break;
  }
  
  ?>

</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
