<?php 

include('../dashboard/include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $productID = mysqli_real_escape_string($conn, $_POST["product_id"]);
    $code      = mysqli_real_escape_string($conn, $_POST["code"]);
    $name      = mysqli_real_escape_string($conn, $_POST["name"]);
    $price     = mysqli_real_escape_string($conn, $_POST["price"]);
    $quantity  = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $size      = mysqli_real_escape_string($conn, $_POST["size"]);
    $image     = $_FILES["product_image"];
   
    //ERROR HANDLING
    if(empty($code) && empty($name) && empty($price) && empty($quantity) && empty($size) && empty($image)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=all&empty&fields");
        exit();
    }

    if(empty($code)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=empty&code");
        exit();
    }

    if(empty($name)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=empty&name");
        exit();
    }

    if(empty($price)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=empty&price");
        exit();
    }

    if(empty($quantity)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=empty&quantity");
        exit();
    }

    if(empty($size)) {
        header("Location: ../dashboard/edit-product.php?product=$productID&error=empty&size");
        exit();
    }
    //END ERROR HANDLING

    $target_dir    = "../dashboard/dist/img/products/";
    //the basename($_FILES["photo"]["name"]) means to get the basename (e.g. test.docx) from the file path (e.g. D://images/test.docx)
    $target_file   = $target_dir . basename($_FILES["product_image"]["name"]);
    //to get the extension of the file (e.g. docx)
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
    if(!empty(basename($_FILES["product_image"]["name"]))) {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if ($check == false) {
            header("Location: ../dashboard/edit-product.php?product=$productID&error=invalid&image");
            exit();
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            header("Location: ../dashboard/edit-product.php?product=$productID&error=invalid&image&type");
            exit();
        }
        //move the file using move_uploaded_file function.
        //If not success transfer, give alert message!
        if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            header("Location: ../dashboard/edit-product.php?product=$productID&error=upload&image&failed");
            exit();
        }
    }

    $query_edit_product = "UPDATE product SET product_name = '$name', product_price = '$price' , product_code = '$code' ,product_qty = '$quantity' , product_size = '$size' ";
    
    if(!empty(basename($_FILES["product_image"]["name"]))){
        $query_edit_product = $query_edit_product . ", product_image = '$target_file'";
    }

    $query_edit_product = $query_edit_product . " WHERE product_id = '$productID'";

    if(!mysqli_query($conn, $query_edit_product)) {
        echo $query_edit_product;
        exit();
        header("Location: ../dashboard/edit-product.php?product=$productID&error=edit&failed");
        exit();
    } else {
        header("Location: ../dashboard/edit-product.php?product=$productID&success=edit&success");
        exit();
    }

    mysqli_close($conn);
}

?>