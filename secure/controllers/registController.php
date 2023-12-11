<?php
include "../db_conn.php";
require_once('../models/fruit.php');

function validatePassword($password) {
    if (strlen($password) < 8) {
        return false;
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        return false;
    }
    $blacklisted = array("!Qq12345");
    if (in_array($password, $blacklisted)) {
        return false;
    }
    return true;
}

$username= $_POST['uname']; 
$pass= $_POST['password'];
$userAddress = $_POST['userAdress'];

$stmt = mysqli_prepare($conn, "SELECT * FROM Users WHERE username=(?)");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$resultGetUser = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultGetUser) !== 0){
    header("Location: ../views/register.php?error=Username already exists!");
    exit();
}

if (validatePassword($pass)) {
    $salt = bin2hex(random_bytes(16));
    $hashed_password = hash('sha256', $pass . $salt);
    $username = htmlspecialchars($username); // to stop XSS attacks using the username
    $stmt = mysqli_prepare($conn, "INSERT INTO Users (username, password, salt, address) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashed_password, $salt, $userAddress);
    mysqli_stmt_execute($stmt);
    
    header("Location: ../index.php?message=You are registered!");
    exit();
} else { 
    header("Location: ../views/register.php?error=Password has to have 8 caracters at least, one uppercase letter, one lowercase letter, one number and one special character!");
    exit();
}