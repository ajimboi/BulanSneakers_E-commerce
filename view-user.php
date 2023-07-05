<?php 
   include('include/header.inc.php');
   
   //GET USER ID AND CONVERT TO INT
   $userID = intval($_GET["user"]);
   
   $sql    = "SELECT * FROM users WHERE u_id = '$userID'";
   $result = mysqli_query($conn, $sql);
   
   if($row = mysqli_fetch_assoc($result)) {
   ?>
<div class="card-body">
   <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $row["u_fullname"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Phone Number</label>
      <input type="number" name="number" class="form-control" value="<?php echo $row["u_phoneNo"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Email address</label>
      <input type="email" name="email" class="form-control" value="<?php echo $row["u_email"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" value="<?php echo $row["u_username"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Gender</label>
      <select class="form-control" name="gender" disabled>
         <option><?php echo $row["u_gender"]; ?></option>
      </select>
   </div>
   <div class="form-group">
      <label>User Role</label>
      <select class="form-control" name="role">
         <option><?php echo $row["u_levelid"]; ?></option>
      </select>
   </div>
</div>
<?php } ?>