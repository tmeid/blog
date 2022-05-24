<?php
    require 'app/database/db.php';

    $tags = selectAll('tag');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
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
                        <article>
                            <a href="#"><img src="assets/imgs/img.png" alt="#"></a>
                            <div>
                                <h2><a href="#">Tên bài viết</a></h2>
                                <p>dd-mm-yy</p>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                            </div>
                            
                        </article>
                        <article>
                            <a href="#"><img src="assets/imgs/img.png" alt="#"></a>
                            <div>
                                <h2><a href="#">Tên bài viết</a></h2>
                                <p>dd-mm-yy</p>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                            </div>
                            
                        </article>
                        <article>
                            <a href="#"><img src="assets/imgs/img.png" alt="#"></a>
                            <div>
                                <h2><a href="#">Tên bài viết</a></h2>
                                <p>dd-mm-yy</p>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                            </div>                       
                        </article>
                        <article>
                            <a href="#"><img src="assets/imgs/img.png" alt="#"></a>
                            <div>
                                <h2><a href="#">Tên bài viết</a></h2>
                                <p>dd-mm-yy</p>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                            </div>                       
                        </article>
                        <article>
                            <a href="#"><img src="assets/imgs/img.png" alt="#"></a>
                            <div>
                                <h2><a href="#">Tên bài viết</a></h2>
                                <p>dd-mm-yy</p>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                            </div>                      
                        </article>
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