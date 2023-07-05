<?php
include('../dashboard/include/database.inc.php');
session_start();

$userID  = intval($_GET['user']);
$sql     = "DELETE FROM users WHERE u_id= $userID ";

if (!mysqli_query($conn, $sql)) {
    header("Location: ../dashboard/users.php?error=delete&failed");
    exit();
} else {
    header("Location: ../dashboard/users.php?success=delete&success");
    exit();
}

mysqli_close($conn);
?>