<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h2>Your Cart!</h2>

    <?php
    require_once('../models/shoppingCart.php');
    session_start();
    echo $_SESSION['shopping_cart']->toString();
    ?>
    <br>
    <a href="../controllers/getProducts.php">Continue Shopping</a>
    <br>
    <a href="../controllers/checkoutController.php">Checkout</a>
</body>
</html>