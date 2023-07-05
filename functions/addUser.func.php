<?php 

include('../dashboard/include/database.inc.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name       = mysqli_real_escape_string($conn, $_POST["name"]);
    $phoneNo    = mysqli_real_escape_string($conn, $_POST["number"]);
    $email      = mysqli_real_escape_string($conn, $_POST["email"]);
    $userName   = mysqli_real_escape_string($conn, $_POST["username"]);
    $password   = mysqli_real_escape_string($conn, $_POST["password"]);
    $cfpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);
    $gender     = mysqli_real_escape_string($conn, $_POST["gender"]);
    $role       = mysqli_real_escape_string($conn, $_POST["role"]);

    if(empty($name) && empty($phoneNo) && empty($email) && empty($userName) && empty($password) && empty($cfpassword) && empty($gender) && empty($role)) {
        header("Location: ../dashboard/add-user.php?error=all&empty&fields");
        exit();
    }

    if(empty($name)) {
        header("Location: ../dashboard/add-user.php?error=empty&name");
        exit();
    }

    if(empty($phoneNo)) {
        header("Location: ../dashboard/add-user.php?error=empty&phoneno");
        exit();
    }

    if(empty($email)) {
        header("Location: ../dashboard/add-user.php?error=empty&email");
        exit();
    }

    if(empty($userName)) {
        header("Location: ../dashboard/add-user.php?error=empty&userName");
        exit();
    }

    if(empty($password)) {
        header("Location: ../dashboard/add-user.php?error=empty&password");
        exit();
    }

    if(empty($cfpassword)) {
        header("Location: ../dashboard/add-user.php?error=empty&cfpassword");
        exit();
    }

    if(empty($gender)) {
        header("Location: ../dashboard/add-user.php?error=empty&gender");
        exit();
    }

    if(empty($role)) {
        header("Location: ../dashboard/add-user.php?error=empty&role");
        exit();
    }

    //CHECK IF USERNAME EXIST
    $sql    = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        if($userName == $row["u_username"]) {
            header("Location: ../dashboard/add-user.php?error=username&exist");
            exit();
        }
    }
    

    //HASHED PASSWORD
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    $query_add_user = "INSERT INTO users (u_username,u_email,u_password,u_fullname,u_phoneno,u_gender, u_levelid) 
    VALUES ('$userName', '$email', '$hashedPass', '$name', '$phoneNo', '$gender', '$role')";

    if(!mysqli_query($conn, $query_add_user)) {
        echo $query_add_user;
        exit();
        header("Location: ../dashboard/add-user.php?error=add&failed");
        exit();
    } else {
        header("Location: ../dashboard/add-user.php?success=add&success");
        exit();
    }

    mysqli_close($conn);
}

?>