<?php
session_start();
unset($_SESSION['isLogin']);
unset($_SESSION['username']);
unset($_SESSION['admin-id']);

session_destroy();
header("location: index.php");


?>