<?php
require_once ROOT_PATH .'/app/database/db.php';
// .htaccess file
// RewriteRule ^(.+).html$ dashboard/posts/post.php?id=$1 [QSA,L]
// $_GET['id'] =   (.+) it means:  $_GET['id']  = current slug
$post = selectOne('post', ['slug' => $_GET['id']]);
// var_dump($post);
