<!DOCTYPE html>
<html lang="en">
<?php
    $page  = "Orders";
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
                <h3 class="card-title">Lists of Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="userLists" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Order ID</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Total Paid</th>
                    <th class="text-center">Order Placed</th>
                    <th class="text-center">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if(isset($_SESSION["u_id"])) {
                    $userID = $_SESSION["u_id"];
                  }
                  if($_SESSION["u_levelid"] == "Admin") {
                    $sql = "SELECT p.*, o.* FROM product p, orders o GROUP BY o.order_id ORDER BY o.order_date DESC";
                  } else if($_SESSION["u_levelid"] == "Member") {
                    $sql = "SELECT p.product_id, p.product_name, o.order_id, o.order_date, o.u_id, o.amount_paid
                    FROM product p, orders o WHERE o.u_id = '$userID' GROUP BY o.order_id ORDER BY o.order_date DESC";
                  } 

                  $result  = mysqli_query($conn, $sql);
                  $counter = 1;
                  while($row = mysqli_fetch_assoc($result)) {
                      /*
                      CONVERT THE FILEPATH FROM ../dashboard/dist/img/products/269-2693599_html5-logo-php-logo-php-logo-png.png
                      TO
                      dist/img/products/269-2693599_html5-logo-php-logo-php-logo-png.png
                      */
                      $date = strtotime($row["order_date"]);
                  ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo $counter++; ?></td>
                    <td class="text-center align-middle"><?php echo $row["order_id"]; ?></td>
                    <td class="text-center align-middle"><?php echo $row["product_name"]; ?></td>
                    <td class="text-center align-middle">RM <?php echo number_format($row["amount_paid"], 2); ?></td>
                    <td class="text-center align-middle"> <?php echo date("F d, Y g:i a", $date) ?></td>
                    <td class="text-center align-middle"><button type="button" onclick="viewOrder('<?php echo $row['order_id']; ?>')" class="btn bg-success openUserModal"><i class="fa fa-eye"></i> View</button></td>
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

      <div class="modal fade" id="orderModal">>
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Order's Information</h4>
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
  function viewOrder(orderID) {
    $('.modal-body').load('view-order.php?order='+orderID, function(){
      $('#orderModal').modal({show: true});
    });
  }                     
</script>

</body>
</html>
