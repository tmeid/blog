<?php
    session_start();
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
        <?php
        if (!isset($_SESSION['canAccess'])) {
            header("location: ../../login.php");
        }

        ?>

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
                            <th>Xuất bản</th>
                            <th colspan="2">Tác vụ</th>
                        </tr>

                        <?php foreach ($posts as $i => $post) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td class="input-tag">
                                    <?php echo $post[TITLE_PROPERTY] ?>
                                    <form action="posts.php" method="POST">
                                        <input type="text" name="edit-tag" class="edit-btn" value="<?php echo $post[TITLE_PROPERTY] ?>">
                                        <input type="hidden" name="tag-id" value="<?php echo $post['id'] ?>">
                                        <input type="submit" name="edited-tag-btn" value="Oke">
                                        <button name="cancel-edit-btn" type="button" class="cancel-edit">&#128473;</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="posts.php" method="POST">
                                        <input type="checkbox" name="authorized" id="isAuthorized" <?php echo $post[PUBLISHED_PROPERTY] ? 'checked' : '' ?>>
                                    </form>
                                </td>
                                <td class="edit"><a href="#">Sửa</a></td>
                                <td class="delete">
                                    <form action="posts.php" method="POST">
                                        <input type="hidden" value="<?php echo $post['id'] ?>" name="tag-id">
                                        <input type="submit" value="Xóa" name="delete-btn" class="delete-btn">
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