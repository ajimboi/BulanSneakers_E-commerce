<!DOCTYPE html>
<html lang="en">

<?php 
    $page = "Checkout";
    include("include/header.inc.php");
?>

<body>
  <!-- Navbar start -->
  <div class="main-banner inner" id="home">
        <!-- header -->
        <?php include("include/navigation.inc.php");?>
        <!-- //header -->

    </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
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
        
        $product = array();
        while ($row = mysqli_fetch_assoc($result)) {
                $img_dir         = substr($row['product_image'], 2);
                $total_price     += $row["total_price"];
                $productName[]   = $row["product_name"];
        }
        $allProducts = implode(', ', $productName);
        ?>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : <?php echo $allProducts; ?></b></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable :RM <?php echo $total_price;?> </b></h5>
        </div>
        <?php 
        $userID = $_SESSION["u_id"];
        $sql = "SELECT * FROM users WHERE u_id = '$userID'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="functions/addOrder.func.php" method="POST" id="placeOrder">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $row["u_fullname"]; ?>" required readonly>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?php echo $row["u_email"]; ?>" required readonly>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" value="<?php echo $row["u_phoneNo"]; ?>" required readonly>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..." readonly><?php echo $row["u_address"]?></textarea>
          </div>
          <?php } ?>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <?php 
             $sqlID = "SELECT c.u_id, c.product_id, SUM(c.cart_qty) AS 'quantity' 
             FROM cart c WHERE c.u_id = '" . $_SESSION["u_id"]."'
             GROUP BY c.product_id";
             $resultID = mysqli_query($conn,$sqlID);
             $rowID = mysqli_fetch_assoc($resultID)
            ?>

            <input type="hidden" value="<?php echo $rowID["u_id"]; ?>" name="u_id">
            <input type="hidden" value="<?php echo $total_price?>" name="total_price">

            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

</body>

</html>