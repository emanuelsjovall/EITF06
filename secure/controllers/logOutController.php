<?php
session_start();
session_unset(); 
session_destroy(); 
setcookie('secure_session_id', '', time(), '/');
header("Location: ../index.php");
exit();?>