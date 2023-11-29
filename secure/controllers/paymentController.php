<?php 
// We can use this to verify that the payment went through and stuff but for now we just redirect to the receipt page
$id = $_POST['transaction_id'];
header("Location: ../views/receipt.php?id=$id");
?>