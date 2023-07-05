<!DOCTYPE html>
<html lang="en">
<?php
    $page  = "Users";
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <a href="add-user.php" class="btn btn-app bg-success"><i class="fa fa-plus"></i> Add User</a>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="userLists" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">User Role</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query   = "SELECT * FROM users ORDER BY u_id DESC";
                  $result  = mysqli_query($conn, $query);
                  $counter = 1;
                  while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo $counter++; ?></td>
                    <td class="text-center align-middle"><?php echo $row["u_fullname"]; ?></td>
                    <td class="text-center align-middle"><?php echo $row["u_email"]; ?></td>
                    <td class="text-center align-middle"><?php echo $row["u_phoneNo"]; ?></td>
                    <td class="text-center align-middle"><?php echo $row["u_levelid"]; ?></td>
                    <td class="text-center align-middle">
                        <button type="button" onclick="viewUser('<?php echo $row['u_id']; ?>')" class="btn btn-app bg-success openUserModal"><i class="fa fa-eye"></i> View</button>
                        <a href="edit-user.php?user=<?php echo $row["u_id"]; ?>" class="btn btn-app bg-warning"><i class="fa fa-edit"></i> Edit</a>                  
                        <button type="button" onclick="deleteUser('<?php echo $row['u_id']; ?>')" class="btn btn-app bg-danger"><i class="fa fa-eye"></i> Delete</button>
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
              <h4 class="modal-title">User's Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="deleteUserModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Account Deletion</h4>
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
  function viewUser(userID) {
    $('.modal-body').load('view-user.php?user='+userID, function(){
      $('#userModal').modal({show: true});
    });
  }     
  function deleteUser(userID) {
    $('.modal-body').load('delete-user.php?user='+userID, function(){
      $('#deleteUserModal').modal({show: true});
    });
  }                   
</script>
<script>
  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  switch (true) {
    case strpos($url, "error=delete&failed"):
      echo "toastr.error('Delete User Failed. Please Try Again.')";
      break;
    case strpos($url, "success=delete&success"):
      echo "toastr.success('Delete User Successfully.')";
      break;
  }
  ?>
  </script>


</body>
</html>
