<?php
// session_start();
require 'path.php';
require 'app/controllers/post.php';
require_once 'app/database/db.php';
require_once 'app/assistance/escape.php';

$tags = selectAll('tag');
$categories = selectAll('category');


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/php/blog/">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/query-post.css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon_io/site.webmanifest">

    <title><?php echo $post['title'] ?> | Water that seed</title>
</head>

<body>
    
    <?php include 'app/blade/header.html' ?>
    <main>
        <section class="container">
            <div class="wrap">
                <div class="left-side">
                    <article class="post">
                        <h1><?php echo escape($post['title']) ?></h1>
                        <span class="time"><?php echo date('j/n/Y', strtotime(escape($post['created_at'])))  ?></span>
                        <div><?php echo ($post['content']) ?></div>
                        <div class="tags">
                            Tag:
                            <?php foreach ($tags_same_post as $tag) : ?>
                                <a href="<?php echo 'tag/' . $tag['slug'] ?>"><?php echo '#' . escape($tag['tag_name']); ?></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="relevant-post">
                            <h3>Có thể bạn quan tâm: </h3>
                            <!-- same category  -->
                            <ul>
                                <?php if (empty($posts_same_category)) : ?>
                                    <li>Chưa có bài liên quan</li>
                                    <?php else :
                                    foreach ($posts_same_category as $psc) : ?>
                                        <li>
                                            <a href="<?php echo 'article/' . $psc['slug'] . '.html' ?>"><img src="<?php echo 'assets/imgs/' . $psc['img'] ?>" alt="<?php echo $psc['title'] ?>"></a>
                                            <h3><a href="<?php echo 'article/' . $psc['slug'] . '.html' ?>">
                                                    <?php echo escape($psc['title']) ?>
                                                </a>
                                            </h3>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </article>
                </div>
                <div class="right-side article-page-search">
                    <?php include 'app/blade/right-site.php'; ?>
                </div>
        </section>
    </main>
    <?php include 'app/blade/footer.html' ?>
    <script src="assets/js/script.js"></script>
</body>