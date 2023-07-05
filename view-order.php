<div class="card-body table-responsive p-0">
   <table class="table table-hover text-nowrap">
      <thead>
         <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Ordered Quantity</th>
            <th>Ordered Size</th>
            <th>Order Placed</th>
         </tr>
      </thead>
      <tbody>
        <?php 
        include('include/header.inc.php');
        
        //GET USER ID AND CONVERT TO INT
        $userID = intval($_GET["order"]);
        
        $sql = "SELECT p.product_id, p.product_name, p.product_image, p.product_size, o.order_id, o.u_id, o.order_date, o.amount_paid, ol.order_quantity,
                (p.product_price * SUM(order_quantity)) AS 'total_price' 
                FROM product p, orders o, order_list ol 
                WHERE o.order_id = '" . $_GET['order'] . "' 
                AND ol.order_id = o.order_id 
                AND p.product_id = ol.product_id
                GROUP BY p.product_id, p.product_name, p.product_image, p.product_size, o.order_id, o.u_id, o.order_date, o.amount_paid, ol.order_quantity"; 
        
        $result = mysqli_query($conn, $sql);
        $total_price = 0;
        
        while ($row = mysqli_fetch_assoc($result)) {
            $date = strtotime($row["order_date"]);
            $image = substr($row['product_image'], 13);
        
                $total_price = $row["amount_paid"];
        ?>
         <tr>
            <td class="text-center align-middle"><?php echo $row["product_id"]; ?></td>
            <td class="text-center align-middle"><?php echo $row["product_name"]; ?></td>
            <td class="text-center align-middle">
                <img src="<?php echo $image;?>" class="img-responsive" alt="Product Image" width="150" height="150">
            </td>
            <td class="text-center align-middle">RM <?php echo number_format($row["total_price"], 2); ?></td>
            <td class="text-center align-middle"><?php echo $row["order_quantity"]; ?></td>
            <td class="text-center align-middle"><?php echo $row["product_size"]; ?></td>
            <td class="text-center align-middle"><?php echo date("F d, Y g:i a", $date); ?></td>
         </tr>
         <?php } ?>
      </tbody>
   </table>

   <p class="text-center">TOTAL PRICE : RM <?php echo $total_price; ?></p>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
<!-- /.row -->
