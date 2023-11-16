<?php
include "../db_conn.php";
require_once('../models/fruit.php');

$username= $_POST['uname']; 
$pass= $_POST['password'];
$userAddress = $_POST['userAdress'];


$salt = bin2hex(random_bytes(16));
$hashed_password = hash('sha256', $$password . $salt);

$insertUser = "INSERT INTO Users (username, password, salt, address) VALUES ('$username', '$hashed_password', '$salt', '$userAddress')";

mysqli_query($conn, $insertUser);

header("Location: ../index.php?message=You are registered!");
exit();