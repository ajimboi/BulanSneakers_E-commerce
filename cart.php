<!DOCTYPE html>
<html lang="en">

<?php 
    $page = "Cart";
    include("include/header.inc.php");

    if(empty($_SESSION["u_id"])) {
      echo "<script>alert('Please Login To View Cart.'); window.history.go(-1);</script>";
    }
?>

<body>
<div class="main-banner inner" id="home">
        <!-- header -->
        <?php include("include/navigation.inc.php"); ?>
        <!-- //header -->

    </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:none" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="9">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
                <?php 
                 $sql = "SELECT p.product_id, p.product_name, p.product_image, p.product_price, p.product_size, cart_id,
                 SUM(cart_qty) AS 'quantity' , (p.product_price * SUM(cart_qty)) AS 'total_price'
                 FROM product p, cart c 
                 WHERE c.u_id = '" . $_SESSION["u_id"] . "' 
                 AND c.product_id = p.product_id 
                 GROUP BY p.product_name, p.product_image, p.product_price";

                $result = mysqli_query($conn, $sql);
                $total_price = 0;
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                        $img_dir = substr($row['product_image'], 3);
                        $total_price += $row["total_price"];
                        $total_row_price = $row["total_price"];
                ?>
                <tr>
                    <td class="align-middle"><?php echo $counter++;?></td>
                    <td class="align-middle"><?php echo $row["product_id"]; ?></td>
                    <td class="align-middle">
                        <img src="<?php echo $img_dir; ?>" class="img-responsive">
                    </td>
                    <td class="align-middle"><?php echo $row["product_name"]; ?></td>
                    <td class="align-middle"><?php echo $row["product_price"]; ?></td>
                    <td class="align-middle"><?php echo $row["product_size"]; ?></td>
                    <td class="align-middle">
                        <form action="functions/editCart.func.php?cart=<?php echo $row["cart_id"]; ?>" method="POST">
                            <input type="number" value="<?php echo $row["quantity"]; ?>" name="quantity" style="width:50px; height:40px;">
                            <button type="submit" class="btn btn-success">Update</a>
                        </form>
                    </td>
                    <td class="align-middle"><a href="functions/deleteCart.func.php?cart=<?php echo $row["cart_id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php } ?>

                <tr>
                <td colspan="3">
                  <a href="shop.php" class="btn btn-success"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b>RM&nbsp;&nbsp;<?php echo number_format($total_price,2);?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
                <td>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>


    <!-- footer -->
    <?php include('include/footer.inc.php');?>
    <!-- //footer -->

</body>

</html>