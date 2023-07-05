<?php 

include('../dashboard/include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userID     = mysqli_real_escape_string($conn, $_POST["u_id"]);
    $name       = mysqli_real_escape_string($conn, $_POST["name"]);
    $phoneNo    = mysqli_real_escape_string($conn, $_POST["number"]);
    $email      = mysqli_real_escape_string($conn, $_POST["email"]);
    $userName   = mysqli_real_escape_string($conn, $_POST["username"]);
    $address    = mysqli_real_escape_string($conn, $_POST["address"]);
    $gender     = mysqli_real_escape_string($conn, $_POST["gender"]);
    $role       = mysqli_real_escape_string($conn, $_POST["role"]);

    if(empty($name) && empty($phoneNo) && empty($email) && empty($userName) && empty($password) && empty($address) && empty($gender) && empty($role)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=all&empty&fields");
        exit();
    }

    if(empty($name)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=empty&name");
        exit();
    }

    if(empty($phoneNo)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=empty&phoneno");
        exit();
    }

    if(empty($email)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=empty&email");
        exit();
    }

    if(empty($address)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=empty&address");
        exit();
    }

    if(empty($gender)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=empty&gender");
        exit();
    }

    if(!empty($role)) {
        $role = $role;
    }
    
    $query_edit_user = "UPDATE users SET u_email = '$email', u_fullname = '$name', u_phoneno = '$phoneNo', u_address = '$address', u_gender = '$gender', u_levelid = '$role'
    WHERE u_id = '$userID'";

    if(!mysqli_query($conn, $query_edit_user)) {
        header("Location: ../dashboard/edit-user.php?user=$userID&error=edit&user&failed");
        exit();
    } else {
        header("Location: ../dashboard/edit-user.php?user=$userID&success=edit&success");
        exit();
    } 
}

?>