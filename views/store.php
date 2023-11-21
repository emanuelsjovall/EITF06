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
                <th>Stock</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fruits as $fruit): ?>
                <tr>
                    <td><?php echo $fruit->getName(); ?></td>
                    <td><?php echo $fruit->getStock(); ?></td>
                    <td><?php echo $fruit->getPrice(); ?></td>
                    <td>    
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $fruit->getStock; ?>" required>
                        <button type="submit">Add to Cart</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="../controllers/logOutController.php">Log Out</a>
    <br>
    <a href="../controllers/seeShoppingCartController.php">See Shopping Cart</a>
    <br>
    <a href="../controllers/checkoutController.php">Checkout</a>
</body>
</html>