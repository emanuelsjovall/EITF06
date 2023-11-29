
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
    <?php
        $input = $_GET['id'];
        if(isset($input)){
            echo "<p>Transaction ID: " . htmlspecialchars($input) . "</p>";
        }
    ?>
    <?php 
        require_once('../models/shoppingCart.php');
        session_start();
        echo $_SESSION['shopping_cart']->toString();
    ?>
</body>
</html>
