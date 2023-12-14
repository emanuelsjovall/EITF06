<?php
include "../db_conn.php";
session_start();
session_unset(); 
session_destroy();
$username = $_COOKIE['username'];
mysqli_query($conn, "DELETE FROM Unsecure WHERE id = '$username'");
setcookie('username', '', -1, '/');
header("Location: ../index.php");
exit();
?>