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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>