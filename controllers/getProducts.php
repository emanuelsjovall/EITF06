<?php
include "../db_conn.php";
require_once('../models/fruit.php');
session_start();

$queryFruits = "SELECT * FROM Products";

echo "hello";

$resultFruits = mysqli_query($conn, $queryFruits);

while ($row = mysqli_fetch_assoc($resultFruits)) {
    $fruit = new Fruit($row['name'], $row['stock'], $row['price']);
    $fruits[] = $fruit;
}

$_SESSION['fruits'] = $fruits;

header("Location: ../views/store.php");
exit();
?>
