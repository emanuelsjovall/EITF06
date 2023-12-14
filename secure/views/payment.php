<?php 
require_once('../models/shoppingCart.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Payment Page</h1>
    </header>

    <p>
        Your total is: <?php echo $_SESSION['shopping_cart']->getTotalPrice(); ?> Coins</br>
        Send it to the following address: 15zxMRUemjZGH9yMf9Y1zmQ5x8S4mYzswV
    </p>

    <div>
        <form action="../controllers/paymentController.php" method="POST">
            <label for="transaction_id">Transaction ID:</label>
            <input type="number" id="transaction_id" name="transaction_id" required>

            <button type="submit">Submit Transaction ID</button>
        </form>
    </div>

</body>
</html>
