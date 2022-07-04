<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-btn'])){
    if(!isset($_POST['_token']) || $_POST['_token'] !== $_SESSION['_token']){
        die('action is denied');
    }
}
$_SESSION['_token'] = bin2hex(random_bytes(32));