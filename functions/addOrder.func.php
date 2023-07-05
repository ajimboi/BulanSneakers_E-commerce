<?php 

include("../include/database.inc.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
        
    $userID      = mysqli_real_escape_string($conn, $_POST["u_id"]);
    $total_price = mysqli_real_escape_string($conn, $_POST["total_price"]);
    $paymentMode = mysqli_real_escape_string($conn, $_POST["pmode"]);

    $sqlCart    = "SELECT * FROM cart WHERE u_id = '$userID'";
    $resultCart = mysqli_query($conn, $sqlCart);
    
    $sql = "INSERT INTO orders (payment_mode, amount_paid, u_id) VALUES ('$paymentMode', '$total_price', '$userID')";

    if(!mysqli_query($conn, $sql)) {
        echo "<script>alert('Payment Failed, Please Try Again'); window.location.href='../checkout.php'</script>";
        exit();
    } else {

        $sqlOrderList = "";

        while($rowCart = mysqli_fetch_assoc($resultCart)) {
            $product_id       = $rowCart["product_id"];
            $product_quantity = $rowCart["cart_qty"];

            $last_id = $conn->insert_id;
        
            $sqlOrderList .= "INSERT INTO order_list(order_id, product_id, order_quantity) 
            VALUES ('$last_id', '$product_id', '$product_quantity');";
        }
        $sqlOrderList .= "DELETE FROM cart WHERE u_id = '$userID'";
        
        if(!mysqli_multi_query($conn, $sqlOrderList)) {
            echo "<script>alert('Payment Failed, Please Try Again'); window.location.href='../checkout.php'</script>";
            exit();
        }
                
        echo "<script>alert('Paid Successfully'); window.location.href='../dashboard/orders.php'</script>";
        exit();
    }

    mysqli_close($conn);
}
?>