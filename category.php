<?php
include 'path.php';
require_once 'app/database/db.php';
require_once 'app/assistance/escape.php';

$result_of_search = [];
$tags = selectAll('tag');
$categories = selectAll('category');

$category = selectAll('category', ['slug' => $_GET['id']]);


if (!empty($category)) {
    //$tag is an array of array
    $category_id = $category[0]['id'];
    $posts_same_category = selectPostSameCategory('post', 'category', 'category_id', 'id', ['published' => 1, 'id' =>  $category_id]);
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/php/blog/">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/query-home.css" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon_io/site.webmanifest">

    <title>Chuyên mục | Water that seed</title>
</head>

<body>
    <?php include 'app/blade/header.html' ?>
    <main>
        <div class="container">
            <div class="wrap">
                <div class="left-side">
                    <?php if (!empty($category)) : ?>
                        <?php foreach ($posts_same_category as $post) : ?>
                            <article class="post-home">
                                <a href="<?php echo 'article/' . $post['slug'] . '.html' ?>">
                                    <img src="assets/imgs/img.png" alt="<?php echo $post['title']; ?>">
                                </a>
                                <div>
                                    <h2><a href="<?php echo 'article/' . $post['slug'] . '.html' ?>"><?php echo escape($post['title']) ?></a></h2>
                                    <p><?php echo date('j/n/Y', strtotime(escape($post['created_at'])))  ?></p>
                                    <p class="description"><?php echo escape($post['description']) ?></p>
                                </div>

                            </article>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Rất tiếc, không tìm thấy trang bạn tìm. </p>
                    <?php endif; ?>
                </div>
                <div class="right-side">
                    <?php include 'app/blade/right-site.php'; ?>
                </div>
            </div>
        </div>
    </main>
    <?php include 'app/blade/footer.html' ?>
    <script src="assets/js/script.js"></script>
</body>
</html>