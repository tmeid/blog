<?php
    session_start();
    require '../../path.php';
    require '../../app/controllers/post.php';

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/php/blog/dashboard/posts/">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/login.css" type="text/css">
    <script src="https://cdn.tiny.cloud/1/n4xefeurkjusm2nc16n44s8wr6x8sdj5a6ahkouj6p7z1bg1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Dashboard | tmeid's Blog</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1><a href="../../index.html"><img src="../../assets/imgs/tmeid-logo.jpg" alt="tmeid-logo">tmeid</a></h1>
                <ul>
                    <li><a href="../../index.html">Trang chủ</a></li>
                    <li><a href="../../about-me.html">Tác giả</a></li>
                </ul>
            </nav>

        </div>
    </header>
    <main>
        <section class="container">
            <article class="post">
               <h1><?php echo $post['title']; ?></h1>
                <div><?php echo $post['content']; ?></div>
                <div>
                    Tag: <? ?>
                </div>
                <div>
                    <h3>Có thể bạn quan tâm: </h3>
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </article>
        </section>
    </main>
    <?php include '../../app/blade/footer.html' ?>
</body>