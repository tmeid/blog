<?php
    session_start();
    if (!isset($_SESSION['canAccess'])) {
        echo("<script>location.href = '../../login.php';</script>");
            // header("location: ../../login.php");
    }
    require '../../path.php';
    require_once ROOT_PATH .'/app/database/admin.php';
    require_once ROOT_PATH .'/app/controllers/posts.php';
    require_once ROOT_PATH .'/app/controllers/categories.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Dashboard | tmeid's Blog</title>
</head>

<body>
    <header>
        <?php include ROOT_PATH .'/app/blade/header_dashboard.php' ?>
    </header>
    <main>
        <div class="dashboard">
            <?php include '../../app/blade/nav_dashboard.php' ?>
            <section class="dashboard-data">
                <div>
                    <h4 class="title-manage">Quản lý bài viết</h4>
                    <a href="create.php" class="btn-create">Thêm bài viết</a>
                    <table class="tags">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th colspan="3">Tác vụ</th>
                        </tr>

                        <?php foreach ($posts as $i => $post) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td class="input-tag"><?php echo $post[TITLE_PROPERTY] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $post['id'] .'&published=' .$post[PUBLISHED_PROPERTY]?>">
                                        <?php echo isset($post[PUBLISHED_PROPERTY]) ? 'thu hồi' : 'xuất bản' ?>
                                    </a> 
                                </td>
                                <td class="edit"><a href="edit.php?id=<?php echo $post['id'] ?>">Sửa</a></td>
                                <td class="delete">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" value="<?php echo $post['id'] ?>" name="post-id">
                                        <input type="submit" value="Xóa" name="btn-delete-post" class="delete-btn">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </table>
                </div>


            </section>
        </div>
    </main>
    <script src="../../assets/js/script.js"></script>
</body>