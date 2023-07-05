<?php 

include("../include/database.inc.php");
session_start();


//VALIDATE IF NO LOGIN, USER CANNOT ADD TO CART
if(empty($_SESSION["u_id"])) {
    echo "<script>alert('Please Login To Add To Cart.'); window.history.go (-1);</script>";
    exit();
}


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantity  = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $userID    = $_SESSION["u_id"];
    $productID = mysqli_real_escape_string($conn, $_POST["product_id"]);

    //ERROR HANDLING
    if(empty($quantity) || $quantity < 1) {
        echo "<script>alert('Please Select A Quantity'); window.history.go (-1);</script>";
        exit();
    }

    $sql = "INSERT INTO cart (product_id, cart_qty, u_id) VALUES ('$productID', '$quantity', '$userID')";

    if(!mysqli_query($conn, $sql)) {
        echo $sql;
        exit();
        echo "<script>alert('Failed To Add Cart'); window.history.go (-1);</script>";
        exit();
    } else {
        echo "<script>alert('Cart Added Successfully'); window.history.go (-1);</script>";
        exit();
    }

    mysqli_close($conn);
}


?>