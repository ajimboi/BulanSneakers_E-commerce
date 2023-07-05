<?php 

include('../include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $cartID   = $_GET["cart"];

    if(empty($quantity) || $quantity< 1) {
        echo "<script>alert('Please Enter A Minimum of 1 Quantity'); window.location.go(-1);</script>";
        exit();
    }
    
    $query_edit_cart = "UPDATE cart SET cart_qty = '$quantity' WHERE cart_id = '$cartID'";

    if(!mysqli_query($conn, $query_edit_cart)) {
        echo "<script>alert('Update Failed. Please Try Again.'); window.location.go(-1);</script>";
        exit();
    } else {
        header("Location: ../cart.php");
        exit();
    } 

    mysqli_close($conn);
}

?>