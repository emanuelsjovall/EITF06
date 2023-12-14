<?php
include "../db_conn.php";
session_start();
session_unset(); 
session_destroy(); 
$secure = $_COOKIE['secure_session_id'];
$stmt = mysqli_prepare($conn, "DELETE FROM Secure WHERE id = (?)");
mysqli_stmt_bind_param($stmt, "s", $secure);
mysqli_stmt_execute($stmt);
setcookie('secure_session_id', '', -1, '/', "localhost", true, true);
header("Location: ../index.php");
exit();
?>