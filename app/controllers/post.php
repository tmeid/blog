<?php
require_once ROOT_PATH .'/app/database/db.php';

// .htaccess file
// RewriteRule ^(.+).html$ dashboard/posts/post.php?id=$1 [QSA,L]
// $_GET['id'] =   (.+) it means:  $_GET['id']  = current slug
$post = selectOne('post', ['slug' => $_GET['id']]);

$post_id = $post['id'];
$category_id = $post['category_id'];
$tags_name = joinTables('post', 'post_tag', 'tag', 'id', 'post_id', 'tag_id', 'id', 'tag_name', $post_id);

// get the posts in the same category
$posts_same_category = selectAll('post', ['category_id' => $category_id], 4);
