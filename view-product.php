<?php 
   include('include/header.inc.php');
   
   //GET USER ID AND CONVERT TO INT
   $productID = intval($_GET["product"]);
   
   $sql    = "SELECT * FROM product WHERE product_id = '$productID'";
   $result = mysqli_query($conn, $sql);
   
   if($row = mysqli_fetch_assoc($result)) {
       $image = substr($row['product_image'], 13);
   ?>
<div class="card-body">
    <div class="form-group text-center">
      <img src="<?php echo $image; ?>" alt="Product Image" width="250" height="250">
   </div>
   <div class="form-group">
      <label>Product Code</label>
      <input type="text" name="name" class="form-control" value="<?php echo $row["product_code"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Product Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $row["product_name"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Product Price</label>
      <input type="number" name="number" class="form-control" value="<?php echo number_format($row["product_price"], 2); ?>" disabled>
   </div>
   <div class="form-group">
      <label>Product Quantity</label>
      <input type="number" name="number" class="form-control" value="<?php echo $row["product_qty"]; ?>" disabled>
   </div>
   <div class="form-group">
      <label>Product Size</label>
      <input type="text" name="username" class="form-control" value="<?php echo $row["product_size"]; ?>" disabled>
   </div>
</div>
<?php } ?>