<?php
    session_start();
    
    unset($_SESSION['isLogin']);
    unset($_SESSION['username']);
    unset($_SESSION['admin-id']);
    unset($_SESSION['board']);
    

    session_destroy();
    echo("<script>location.href = 'index.html';</script>");
    // header("location: index.php");


    
