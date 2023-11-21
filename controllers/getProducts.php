<?php
include "../db_conn.php";
require_once('../models/fruit.php');
require_once('../models/shoppingCart.php');

session_start();

$queryFruits = "SELECT * FROM Products";

$resultFruits = mysqli_query($conn, $queryFruits);

while ($row = mysqli_fetch_assoc($resultFruits)) {
    $fruit = new Fruit($row['name'], $row['stock'], $row['price']);
    $fruits[] = $fruit;
}

$_SESSION['fruits'] = $fruits;

if (!isset($_SESSION['shopping_cart']) && gettype($_SESSION['shopping']) !== "ShoppingCart") {
    $_SESSION['shopping_cart'] = new ShoppingCart();
}

header("Location: ../views/store.php");
exit();
?>
