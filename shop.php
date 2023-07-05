
<!DOCTYPE html>
<html lang="en">

<?php 
    $page = "Shop";
    include("include/header.inc.php");
?>

<body>
  <!-- Navbar start -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <?php include("include/navigation.inc.php"); ?>
        <!-- //header -->

    </div>
  <!-- Navbar end -->

  <!-- Displaying Products Start -->
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
        <?php 
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $productImage = substr($row['product_image'], 3);
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="<?php echo $productImage;?>" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info"><?php echo $row["product_name"]?></h4>
                        <h5 class="card-text text-center text-danger">RM <?php echo number_format($row["product_price"], 2); ?></h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="functions/addCart.func.php" method="POST" class="form-submit">
                            <div class="row p-2">
                            <div class="col-md-6 py-1 pl-4">
                                <b>Quantity : </b>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control pqty" value="1" name="quantity">
                            </div>
                            <div class="col-md-6 py-2 pl-4">
                                <b>Size: </b>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control psize" value="<?php echo $row["product_size"]?>" name="size" disabled>
                            </div>
                            </div>
                            <input type="hidden" value="<?php echo $row["product_id"]; ?>" name="product_id">
                            <button type="submit" class="btn btn-info btn-block addItemBtn"><i class="fa fa-cart-plus"></i>  Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>


<div>
    <!-- footer -->
    <?php include('include/footer.inc.php');?>
    <!-- //footer -->
</div>
</body>

</html>