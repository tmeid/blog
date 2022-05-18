<?php
session_start();
unset($_SESSION['isLogin']);
unset($_SESSION['username']);

session_destroy();
header("location: index.php");


?>