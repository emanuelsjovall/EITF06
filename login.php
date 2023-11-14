<?php
include "db_conn.php";

$uname= $_POST['uname']; 
$pass= $_POST['password'];

$query = "SELECT * FROM Users WHERE username='$uname' AND password='$pass'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)){
    echo "You are logged in!";
    exit();
}
else{
    header("Location: index.php?error=Incorrect username or password");
    exit();
}