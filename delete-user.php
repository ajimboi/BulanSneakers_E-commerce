<?php 
   include('include/header.inc.php');
   
   //GET USER ID AND CONVERT TO INT
   $userID = intval($_GET["user"]);

   $sql    = "SELECT * FROM users WHERE u_id = '$userID'";
   $result = mysqli_query($conn, $sql);

   if($row = mysqli_fetch_assoc($result)) {
?>

<form action="../functions/deleteUser.func.php?user=<?php echo $userID;?>" method="POST"> 
    <p>Are you sure you want to delete user <b><?php echo $row["u_fullname"]; ?></b></p>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <button type="button" class="btn btn-block bg-gradient-secondary" data-dismiss="modal">Cancel</button>
    </div>
    <div class="col-md-4">
            <button type="submit" class="btn btn-block btn-danger">Delete</button>
    </div>       
</div>
</form>
<?php } ?>