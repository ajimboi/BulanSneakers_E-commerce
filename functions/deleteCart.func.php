<?php
include('../include/database.inc.php');
session_start();

$cartID     = intval($_GET['cart']);
$sql        = "DELETE FROM cart WHERE cart_id= $cartID ";

if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('Delete Failed. Please Try Again.'); window.location.go(-1);</script>";
    exit();
} else {
    header("Location: ../cart.php");
    exit();
}

mysqli_close($conn);
?>