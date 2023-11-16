<?php
include "../db_conn.php";
require_once('../models/fruit.php');

$username= $_POST['uname']; 
$pass= $_POST['password'];

$getUserQuery = "SELECT * FROM Users WHERE username='$username'";
$resultGetUser = mysqli_query($conn, $getUserQuery);
if (mysqli_num_rows($resultGetUser) == 0){
    header("Location: ../index.php?error=Username does not exist!");
    exit();
}

$rowUser = mysqli_fetch_assoc($resultGetUser);
if ($rowUser['password'] != hash('sha256', $$password . $row['salt'])){
    $queryFruits = "SELECT * FROM Products";

    $resultFruits = mysqli_query($conn, $queryFruits);

    while ($row = mysqli_fetch_assoc($resultFruits)) {
        $fruit = new Fruit($row['name'], $row['stock'], $row['price']);
        $fruits[] = $fruit;
    }

    session_start();
    $_SESSION['fruits'] = $fruits;

    header("Location: ../views/store.php");
    exit();
}else{
    header("Location: ../index.php?error=Incorrect username or password");
    exit();
}