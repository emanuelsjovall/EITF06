
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
    <?php
        if(isset($_GET['id'])) {
            echo "<p>Transaction ID: " . $_GET['id'] . "</p>";
        }
    ?>
    <?php 
        require_once('../models/shoppingCart.php');
        session_start();
        echo $_SESSION['shopping_cart']->toString();
    ?>
</body>
</html>
