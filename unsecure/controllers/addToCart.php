<?php
require_once('../models/shoppingCart.php');
session_start();

$productName = $_POST["product_name"];
$productPrice = $_POST["product_price"];
$quantity = $_POST["quantity"];

$shoppingCart = $_SESSION['shopping_cart'];
$shoppingCart->addProduct($productName, $productPrice, $quantity);
$_SESSION['shopping_cart'] = $shoppingCart;

header("Location: getProducts.php");
exit();
?>