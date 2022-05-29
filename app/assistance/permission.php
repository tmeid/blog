<?php
    session_start();
    if (!isset($_SESSION['canAccess'])) {
        echo("<script>location.href = '../../login.php';</script>");
    }

?>