<?php
include 'path.php';
require_once 'app/controllers/home.php';
require_once 'app/assistance/escape.php';

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/query-home.css" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon_io/site.webmanifest">
    <title>Water that seed</title>
</head>

<body>
    <?php include 'app/blade/header.html' ?>
    <main>
        <div class="container">
            <div class="wrap">
                <div class="left-side">
                    <?php if (isset($_GET['search']) && $_GET['search'] !== '') : ?>
                        <p>Kết quả tìm kiếm cho: <?php echo escape($_GET['search']) ?></p>
                        <?php foreach ($result_of_search as $post) : ?>
                            <ul class="result">
                                <li>
                                    <h2><a href="<?php echo 'article/' . $post['slug'] . '.html' ?>"><?php echo escape($post['title']) ?></a></h2>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($posts as $post) : ?>
                            <article class="post-home">
                                <a href="<?php echo 'article/' . $post['slug'] . '.html' ?>">
                                    <img src="assets/imgs/img.png" alt="<?php echo $post['title']; ?>">
                                </a>
                                <div>
                                    <h2><a href="<?php echo 'article/' . $post['slug'] . '.html' ?>"><?php echo escape($post['title']); ?></a></h2>
                                    <span class="time"><?php echo date('j/n/Y', strtotime(escape($post['created_at'])))  ?></span>
                                    <p class="description"><?php echo escape($post['description']) ?></p>
                                </div>

                            </article>
                        <?php endforeach; ?>
                        <div class="pagination">
                            <?php if ($page > 1) : ?>
                                <a href="index.html?page=1">&#x000AB;</a>
                                <a href="index.html?page=<?php echo $page - 1 ?>">&larr;</a>
                            <?php endif; ?>

                            <?php if (isset($last_page) && $last_page > 1 && $page < $last_page) : ?>
                                <a href="index.html?page=<?php echo $page + 1 ?>">&rarr;</a>
                                <a href="index.html?page=<?php echo $last_page ?>">&#x000BB;</a>
                            <?php endif; ?>
                        </div>
                    <?php endif ?>
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