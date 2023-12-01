<?php
include "../db_conn.php";
require_once('../models/fruit.php');

$username= $_POST['uname']; 
$pass= $_POST['password'];

$getUserQuery = "SELECT * FROM Users_Unsec WHERE username='$username' AND password='$pass'";
$resultGetUser = mysqli_query($conn, $getUserQuery);
if (mysqli_num_rows($resultGetUser) === 0){
    header("Location: ../index.php?error=Incorrect username or password, 1");
    exit();
}

$rowUser = mysqli_fetch_assoc($resultGetUser);
session_start();
if (isset($_POST['keepLoggedIn']) && $_POST['keepLoggedIn'] == 'on') {
    setcookie('username', $rowUser['username'], time() + (86400 * 30), "/"); 
}
$_SESSION['username'] = $rowUser['username'];
header("Location: getProducts.php");


