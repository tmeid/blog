<?php
    require 'app/database/db.php';
    $tags = selectAll('tag');
    $posts = selectAll('post', ['published' => 1]);
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset=UTF-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon_io/site.webmanifest">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <title>tmeid's Blog</title>
    </head>
    <body>
        <?php include 'app/blade/header.html' ?>
        <main>
            <div class="container">
                <div class="wrap">
                    <div class="left-side">
                        <?php foreach($posts as $post):?>
                            <article class="post-home">
                                <a href="<?php echo 'article/' .$post['slug'] .'.html'?>">
                                <img src="assets/imgs/img.png" alt="<?php echo $post['title']; ?>">
                                </a>
                                <div>
                                    <h2><a href="<?php echo 'article/' .$post['slug'] .'.html'?>"><?php echo $post['title'] ?></a></h2>
                                    <p>dd-mm-yy</p>
                                    <p><?php echo $post['description'] ?></p>
                                </div>
                                
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class="right-side">
                        <form action="#" class="search">
                            <input type="text" placeholder="Tìm kiếm...">
                        </form>
                        <div>
                            <h4 class="tag-header">Tags</h4>
                            <?php foreach($tags as $tag): ?>
                                <a href="#" class="tag"><?php echo $tag['tag_name'] ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </main>
        <?php include 'app/blade/footer.html' ?>
        <script src="assets/js/script.js"></script>
    </body>
</html>