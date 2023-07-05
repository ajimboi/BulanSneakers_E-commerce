<?php 
   include('include/header.inc.php');
   
   //GET USER ID AND CONVERT TO INT
   $productID = intval($_GET["product"]);

   $sql    = "SELECT * FROM product WHERE product_id = '$productID'";
   $result = mysqli_query($conn, $sql);

   if($row = mysqli_fetch_assoc($result)) {
?>

<form action="../functions/deleteProduct.func.php?product=<?php echo $productID;?>" method="POST"> 
    <p>Are you sure you want to delete product <b><?php echo $row["product_name"]; ?></b></p>
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