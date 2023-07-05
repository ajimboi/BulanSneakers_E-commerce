<?php
include('../dashboard/include/database.inc.php');
session_start();

$productID  = intval($_GET['product']);
$sql        = "DELETE FROM product WHERE product_id= $productID ";

if (!mysqli_query($conn, $sql)) {
    echo $sql;
    exit();
    header("Location: ../dashboard/products.php?error=delete&failed");
    exit();
} else {
    header("Location: ../dashboard/products.php?success=delete&success");
    exit();
}

mysqli_close($conn);
?>