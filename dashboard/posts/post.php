<?php
// session_start();
require '../../path.php';
require '../../app/controllers/post.php';
require_once '../../app/database/db.php';

$result_of_search = [];
$msg = 'Kết quả tìm kiếm cho: ';

if (!empty($_POST['search'])) {
    $msg = $msg . $_POST['search'];
    $result_of_search = search($_POST['search']);
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/php/blog/dashboard/posts/">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/query-post.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon_io/site.webmanifest">
    
    <title><?php echo ($post['title']) ?> | tmeid's Blog</title>
</head>

<body>
<header>
        <div class="container">
            <nav class="menu">
                <h1 class="logo"><a href="../../index.html"><img src="../../assets/imgs/tmeid-logo.jpg" alt="tmeid-logo">tmeid</a></h1>
                <div class="left-nav">
                    <ul>
                        <li><a href="../../index.html">Trang chủ</a></li>
                        <li><a href="../../about-me.html">Tác giả</a></li>
                    </ul>
                    <div class="search-icon">
                        <span>&#128269;</span>
                    </div>
                    <div class="hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
    
                </div>
            </nav>
            <div class="search-bar">
                <form action="#" method="POST">
                    <input type="text" placeholder="Nhập từ khóa để tìm..." name="search">
                    <!-- <input type="search" name="search" placeholder="&#128270;"> -->
                </form>
            </div>
    
            <nav class="popup-menu">
                <ul>
                    <li><a href="../../index.html">Trang chủ</a></li>
                    <li><a href="../../about-me.html">Tác giả</a></li>
                </ul>
    
            </nav>
    
    
        </div>
    </header>
    <main>
        <section class="container">
            <div class="wrap">
                <div class="left-side">
                    <article class="post">
                        <h1><?php echo ($post['title']) ?></h1>
                        <span class="time"><?php echo date('j/n/Y', strtotime($post['created_at']))  ?></span>
                        <div><?php echo ($post['content']) ?></div>
                        <div class="tags">
                            Tag:
                            <?php foreach ($tags_same_post as $tag) : ?>
                                <a href="<?php echo '../../tag/' . $tag['slug'] ?>"><?php echo '#' . $tag['tag_name']; ?></a>
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
                                            <a href="<?php echo '../../article/' . $psc['slug'] . '.html' ?>"><img src="<?php echo '../../assets/imgs/' . $psc['img'] ?>" alt="<?php echo $psc['title'] ?>"></a>
                                            <h3><a href="<?php $psc['img'] ?>">
                                                    <?php echo $psc['title'] ?>
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
                    <form action="../../article/<?php echo $post['slug'] .'.html' ?>" class="search" method="POST">
                        <input type="text" placeholder="Tìm kiếm..." name="search">
                        <!-- <input type="search" name="search" placeholder="&#128270;"> -->
                    </form>

                    <?php if (!empty($result_of_search)) : ?>
                        <p><?php echo $msg; ?></p>
                        <ul class="each-post-search">
                            <?php foreach ($result_of_search as $post) : ?>                  
                                <li><h1><a href="<?php echo 'article/' . $post['slug'] . '.html' ?>"><?php echo $post['title'] ?></a></h1></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
        </section>
    </main>
    <?php include '../../app/blade/footer.html' ?>
    <script src="../../assets/js/script.js"></script>
</body>