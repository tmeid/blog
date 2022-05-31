<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'blog';

$connect = new mysqli($host, $user, $pass, $db_name);
if($connect->connect_error){
    die('Db connection error: ' . $connect->connect_error);
}



