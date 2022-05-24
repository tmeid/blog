<?php
    session_start();
    if (!isset($_SESSION['canAccess'])) {
        header("location: ../../login.php");
    }

?>