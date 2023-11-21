<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fruit Store</title>
</head>
<body>
    <h2>Fruit Store</h2>

    <?php
    require_once('../models/fruit.php');
    session_start();

    $fruits = $_SESSION['fruits'];
    
    ?>
    <table>
        <thead>
            <tr>
                <th>Fruit</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fruits as $fruit): ?>
                <tr>
                    <td><?php echo $fruit->getName(); ?></td>
                    <td><?php echo $fruit->getPrice() . "$"; ?></td>
                    <td>    
                        <form method="post" action="../controllers/addToCart.php">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                        <input type="hidden" name="product_name" value="<?php echo $fruit->getName(); ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fruit->getPrice(); ?>">
                        <button type="submit">Add to Cart</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="../controllers/logOutController.php">Log Out</a>
    <br>
    <a href="shoppingCart.php">See Shopping Cart</a>
    <br>
    <a href="../controllers/checkoutController.php">Checkout</a>
</body>
</html>