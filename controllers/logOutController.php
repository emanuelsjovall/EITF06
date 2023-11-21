<?php
session_start();
session_unset(); 
session_destroy(); 
setcookie('username', '', time(), '/');
header("Location: ../index.php");
exit();?>