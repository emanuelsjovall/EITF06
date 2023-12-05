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
        <!-- Make sure that the webserver wallet is running on port 8080 -->
        Send it to the following address:
        <?php 
        // i put the Simpleblockchain code in the htdocs file in XAMPP
        // if it's anywhere else just change the $command to your fullpath 
            $command = '/Applications/XAMPP/xamppfiles/htdocs/SimpleBlockchain/./cli server getwalletaddress -apiport 8080';
            echo exec($command);
        ?>
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
