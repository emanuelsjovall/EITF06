<?php
include "../db_conn.php";
require_once('../models/fruit.php');
session_start();

$username= $_POST['uname']; 
$pass= $_POST['password'];

if (isset($_SESSION['timeout']) && ((int)$_SESSION['timeout'] > time())) {
    header("Location: ../index.php?error=Too many attempts, try again later");
    exit();
}

$stmt = mysqli_prepare($conn, "SELECT * FROM Users WHERE username=(?)");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$resultGetUser = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultGetUser) === 0){
    failed_login();
}

$rowUser = mysqli_fetch_assoc($resultGetUser);
if (hash_equals($rowUser['password'], hash('sha256', $pass . $rowUser['salt']))){
    $secureSessionId = bin2hex(random_bytes(64));
    if (isset($_POST['keepLoggedIn']) && $_POST['keepLoggedIn'] == 'on') {
        setcookie('secure_session_id', $secureSessionId, time() + (86400 * 30), "/", "localhost", true, true); 
    }
    $_SESSION['username'] = $rowUser['username'];
    $_SESSION['attempts'] = 0;
    header("Location: getProducts.php");
    exit();
} else {
    failed_login();
}

function failed_login() {
    if (isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
    } else {
        $_SESSION['attempts'] = 1;
    }

    if ($_SESSION['attempts'] > 5) {
        $_SESSION['timeout'] = time() + 60*5; // five minutes timeout
        header("Location: ../index.php?error=Too many attempts, try again later");
        exit();
    }

    header("Location: ../index.php?error=Incorrect username or password");
    exit();
}