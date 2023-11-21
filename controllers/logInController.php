<?php
include "../db_conn.php";
require_once('../models/fruit.php');

$username= $_POST['uname']; 
$pass= $_POST['password'];

$getUserQuery = "SELECT * FROM Users WHERE username='$username'";
$resultGetUser = mysqli_query($conn, $getUserQuery);
if (mysqli_num_rows($resultGetUser) === 0){
    header("Location: ../index.php?error=Incorrect username or password");
    exit();
}

$rowUser = mysqli_fetch_assoc($resultGetUser);
if ($rowUser['password'] === hash('sha256', $$password . $row['salt'])){
    if (isset($_POST['keepLoggedIn']) && $_POST['keepLoggedIn'] == 'on') {
        session_start();
        setcookie('username', $username, time() + (86400 * 30), "/"); 
    } else {
        $_SESSION['username'] = $username;
    }
    header("Location: getProducts.php");
    exit();
}else{
    header("Location: ../index.php?error=Incorrect username or password");
    exit();
}