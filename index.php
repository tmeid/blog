<?php
    include 'path.php';
    require_once 'app/database/db.php';

    $result_of_search = [];
    $msg = 'Kết quả tìm kiếm cho: ';
    $tags = selectAll('tag');
    $categories = selectAll('category');
    // $posts = selectAll('post', ['published' => 1], 0, [], true);

    $posts = queryPosts('post');
    if(!empty($_POST['search'])){
        $msg = $msg .$_POST['search'];
        $result_of_search = search($_POST['search']);
    }
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
        <title>tmeid's Blog</title>
    </head>
    <body>
        <?php include 'app/blade/header.html' ?>
        <main>
            <div class="container">
                <div class="wrap">
                    <div class="left-side">
                        <?php if (!empty($result_of_search)) : ?>
                            <p><?php echo $msg; ?></p>
                            <?php foreach ($result_of_search as $post) : ?>
                                <article class="post-home">
                                    <div>
                                        <h2><a href="<?php echo 'article/' . $post['slug'] . '.html' ?>"><?php echo $post['title'] ?></a></h2>
                                        <p><?php echo $post['description'] ?></p>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach($posts as $post):?>
                                <article class="post-home">
                                    <a href="<?php echo 'article/' .$post['slug'] .'.html'?>">
                                    <img src="assets/imgs/img.png" alt="<?php echo $post['title']; ?>">
                                    </a>
                                    <div>
                                        <h2><a href="<?php echo 'article/' .$post['slug'] .'.html'?>"><?php echo $post['title'] ?></a></h2>
                                        <span class="time"><?php echo date('j/n/Y', strtotime($post['created_at']))  ?></span>
                                        <p class="description"><?php echo $post['description'] ?></p>
                                    </div>
                                    
                                </article>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <div class="right-side">
                        <?php include 'app/blade/right-site.php'; ?>
                    </div>
                </div>
                <!-- <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul> -->
            </div>
        </main>
        <?php include 'app/blade/footer.html' ?>
        <script src="assets/js/script.js"></script>
    </body>
</html>