<!DOCTYPE html>
<html lang="en">
<?php
    $page  = "Products";
    include('include/header.inc.php');
?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" height="60" width="60">
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
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lists of Products</h3>
              </div>
              <a href="add-product.php" class="btn btn-app bg-success"><i class="fa fa-plus"></i> Add Product</a>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="userLists" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Product Code</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Price</th>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query   = "SELECT * FROM product ORDER BY product_id DESC";
                  $result  = mysqli_query($conn, $query);
                  $counter = 1;
                  while($row = mysqli_fetch_assoc($result)) {
                      /*
                      CONVERT THE FILEPATH FROM ../dashboard/dist/img/products/269-2693599_html5-logo-php-logo-php-logo-png.png
                      TO
                      dist/img/products/269-2693599_html5-logo-php-logo-php-logo-png.png
                      */
                      $image = substr($row['product_image'], 13);
                  ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo $counter++; ?></td>
                    <td class="text-center align-middle"><?php echo $row["product_code"]; ?></td>
                    <td class="text-center align-middle"><?php echo $row["product_name"]; ?></td>
                    <td class="text-center align-middle">RM <?php echo number_format($row["product_price"], 2); ?></td>
                    <td class="text-center align-middle">
                        <img src="<?php echo $image;?>"  class="img-responsive" alt="Product Image" width="150" height="150">
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" onclick="viewProduct('<?php echo $row['product_id']; ?>')" class="btn btn-app bg-success openUserModal"><i class="fa fa-eye"></i> View</button>
                        <a href="edit-product.php?product=<?php echo $row["product_id"]; ?>" class="btn btn-app bg-warning"><i class="fa fa-edit"></i> Edit</a>                  
                        <button type="button" onclick="deleteProduct('<?php echo $row['product_id']; ?>')" class="btn btn-app bg-danger openUserModal"><i class="fa fa-eye"></i> Delete</button>
                    </td>
                  </tr>
                  
                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <div class="modal fade" id="userModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Product's Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="deleteProductModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Product Deletion</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
    $("#userLists").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#userLists_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  function viewProduct(productID) {
    $('.modal-body').load('view-product.php?product='+productID, function(){
      $('#userModal').modal({show: true});
    });
  }   
  function deleteProduct(productID) {
    $('.modal-body').load('delete-product.php?product='+productID, function(){
      $('#deleteProductModal').modal({show: true});
    });
  }                        
</script>
<script>
  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  switch (true) {
    case strpos($url, "error=delete&failed"):
      echo "toastr.error('Delete Product Failed. Please Try Again.')";
      break;
    case strpos($url, "success=delete&success"):
      echo "toastr.success('Delete Product Successfully.')";
      break;
  }
  ?>
  </script>

</body>
</html>
