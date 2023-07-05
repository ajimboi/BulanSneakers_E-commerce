<?php 

include('../dashboard/include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $code     = mysqli_real_escape_string($conn, $_POST["code"]);
    $name     = mysqli_real_escape_string($conn, $_POST["name"]);
    $price    = mysqli_real_escape_string($conn, $_POST["price"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $size     = mysqli_real_escape_string($conn, $_POST["size"]);
    $image    = $_FILES["product_image"];
   
    //ERROR HANDLING
    if(empty($code) && empty($name) && empty($price) && empty($quantity) && empty($size) && empty($image)) {
        header("Location: ../dashboard/add-product.php?error=all&empty&fields");
        exit();
    }

    if(empty($code)) {
        header("Location: ../dashboard/add-product.php?error=empty&code");
        exit();
    }

    if(empty($name)) {
        header("Location: ../dashboard/add-product.php?error=empty&name");
        exit();
    }

    if(empty($price)) {
        header("Location: ../dashboard/add-product.php?error=empty&price");
        exit();
    }

    if(empty($quantity)) {
        header("Location: ../dashboard/add-product.php?error=empty&quantity");
        exit();
    }

    if(empty($size)) {
        header("Location: ../dashboard/add-product.php?error=empty&size");
        exit();
    }
    //END ERROR HANDLING

    $target_dir    = "../dashboard/dist/img/products/";
    //the basename($_FILES["photo"]["name"]) means to get the basename (e.g. test.docx) from the file path (e.g. D://images/test.docx)
    $target_file   = $target_dir . basename($_FILES["product_image"]["name"]);
    //to get the extension of the file (e.g. docx)
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if ($check == false) {
        header("Location: ../dashboard/add-product.php?error=invalid&image");
        exit();
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        header("Location: ../dashboard/add-product.php?error=invalid&image&type");
        exit();
    }
    //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        header("Location: ../dashboard/add-product.php?error=upload&image&failed");
        exit();
    }

    $query_add_product = "INSERT INTO product (product_name, product_price ,product_image ,product_code ,product_qty ,product_size) 
    VALUES ('$name', '$price', '$target_file', '$code', '$quantity', '$size')";

    if(!mysqli_query($conn, $query_add_product)) {
        echo $query_add_product;
        exit();
        header("Location: ../dashboard/add-product.php?error=edit&failed");
        exit();
    } else {
        header("Location: ../dashboard/add-product.php?success=edit&success");
        exit();
    }

    mysqli_close($conn);
}

?>