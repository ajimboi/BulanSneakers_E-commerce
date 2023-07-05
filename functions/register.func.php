<?php 

include('../include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name       = mysqli_real_escape_string($conn, $_POST["name"]);
    $phoneNo    = mysqli_real_escape_string($conn, $_POST["number"]);
    $email      = mysqli_real_escape_string($conn, $_POST["email"]);
    $userName   = mysqli_real_escape_string($conn, $_POST["username"]);
    $password   = mysqli_real_escape_string($conn, $_POST["password"]);
    $cfpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);
    $address    = mysqli_real_escape_string($conn, $_POST["address"]);
    $gender     = mysqli_real_escape_string($conn, $_POST["gender"]);    

    if(empty($name) && empty($phoneNo) && empty($email) && empty($userName) && empty($password) && empty($cfpassword) && empty($gender) && empty($role)) {
        echo "<script>alert('Please Fill In All Required Fields.'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($name)) {
        echo "<script>alert('Please Fill In The Name'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($phoneNo)) {
        echo "<script>alert('Please Fill In The Phone Number'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($email)) {
        echo "<script>alert('Please Fill In The Email Address'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($userName)) {
        echo "<script>alert('Please Fill In The Username'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($password)) {
        echo "<script>alert('Please Fill In The Password'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($cfpassword)) {
        echo "<script>alert('Please Fill In The Confirm Password'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($address)) {
        echo "<script>alert('Please Fill In The Address'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($gender)) {
        echo "<script>alert('Please Select A Gender'); window.history.go (-1);</script>";
        exit();
    }

    //CHECK IF USERNAME EXIST
    $sql    = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        if($userName == $row["u_username"]) {
            echo "<script>alert('Username Exists. Please Try Another Username.'); window.history.go (-1);</script>";
            exit();
        }
    }

    //HASHED PASSWORD
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    $query_add_user = "INSERT INTO users (u_username,u_email,u_password,u_fullname,u_phoneno,u_gender, u_address ) 
    VALUES ('$userName', '$email', '$hashedPass', '$name', '$phoneNo', '$gender', '$address')";

    if(!mysqli_query($conn, $query_add_user)) {
        echo $query_add_user;
        exit();
        echo "<script>alert('Registration Failed. Please Try Again.'); window.history.go (-1);</script>";
        exit();
    } else {
        echo "<script>alert('Registration Successful.'); window.location.href='../authentication.php'</script>";
        exit();
    }

    mysqli_close($conn);
}

?>