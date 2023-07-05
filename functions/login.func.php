<?php 

include('../include/database.inc.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username        = mysqli_real_escape_string($conn, strip_tags($_POST['username']));  
    $password        = mysqli_real_escape_string($conn, strip_tags($_POST['password'])); 


    if(empty($username)) {
        echo "<script>alert('Please Enter Your Username.'); window.history.go (-1);</script>";
        exit();
    }

    if(empty($password)) {
        echo "<script>alert('Please Enter Your Password'); window.history.go (-1);</script>";
        exit();
    }

    $sql         = "SELECT * FROM users WHERE u_username = '$username'";
    $result      = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        echo "<script>alert('Account Does Not Exists. Please Try Again.'); window.history.go (-1);</script>";
        exit();
    } else {
        if($row = mysqli_fetch_assoc($result)) {
            $hashedPassCheck = password_verify($password, $row["u_password"]);
            if($hashedPassCheck == false) {
                echo "<script>alert('Invalid Password. Please Try Again.'); window.history.go (-1);</script>";
                exit();
            } elseif($hashedPassCheck == true) {
                //STORE USER SESSION
                $_SESSION['u_id']       = $row['u_id'];
                $_SESSION['u_fullname'] = $row['u_fullname'];
                $_SESSION['u_email']    = $row['u_email'];
                $_SESSION['u_levelid']  = $row['u_levelid'];
                
                //DIRECT TO HOME PAGE
                echo "<script>alert('Login Successfully.'); window.location='../index.php'</script>";
                exit();
            }
        } 
    }
}
?>