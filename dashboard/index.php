<?php
session_start();
if (!isset($_SESSION['canAccess'])) {
    header("location: ../login.php");
}
include_once '../path.php';
require ROOT_PATH . '/app/database/admin.php';
require ROOT_PATH . '/app/controllers/tags.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Dashboard | tmeid's Blog</title>
</head>

<body>
    <header>
        <nav class="dashboard-nav">
            <h1 class="logo"><a href="../index.html"><img src="../assets/imgs/tmeid-logo.jpg" alt="tmeid-logo">tmeid</a></h1>
            <h2>Dashboard</h2>
            <div class="admin">
                <span><?php echo $_SESSION['username']  ?></span>
                <span><a href="../logout.php">Thoát</a></span>
            </div>

            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
        <nav class="popup-menu">
            <ul>
                <li><a href="index.php">Quản lý tag</a></li>
                <li><a href="categories">Quản lý chuyên mục</a></li>
                <li><a href="posts">Quản lý bài viết</a></li>
                <?php if ($_SESSION['board'] === OWNER) : ?>
                    <li><a href="admins">Quản lý admin</a></li>
                <?php endif ?>
            </ul>

        </nav>
    </header>
    <main>
        <div class="dashboard">
            <nav class="manage">
                <ul>
                    <li><a href="index.php">Quản lý tag</a></li>
                    <li><a href="categories">Quản lý chuyên mục</a></li>
                    <li><a href="posts">Quản lý bài viết</a></li>
                    <?php if ($_SESSION['board'] === OWNER) : ?>
                        <li><a href="admins">Quản lý admin</a></li>
                    <?php endif ?>
                </ul>
            </nav>
            <section class="dashboard-data">
                <div>
                    <h4 class="title-manage">Quản lý tag</h4>
                    <table class="tags">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th colspan="2">Tác vụ</th>
                        </tr>

                        <?php foreach ($tags as $i => $tag) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td class="input-tag">
                                    <?php echo $tag[TAG_NAME_PROPERTY] ?>
                                    <form action="index.php" method="POST">
                                        <input type="text" name="edit-tag" class="edit-btn" value="<?php echo $tag[TAG_NAME_PROPERTY] ?>">
                                        <input type="hidden" name="tag-id" value="<?php echo $tag['id'] ?>">
                                        <input type="submit" name="edited-tag-btn" value="Oke">
                                        <button name="cancel-edit-btn" type="button" class="cancel-edit">&#128473;</button>
                                    </form>
                                </td>
                                <td class="edit"><a href="#">Sửa</a></td>
                                <td class="delete">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" value="<?php echo $tag['id'] ?>" name="tag-id">
                                        <input type="hidden" value="<?php echo $_SESSION['_token'] ?>" name="_token">
                                        <input type="submit" value="Xóa" name="delete-btn" class="delete-btn">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </table>
                </div>
                <form action="index.php" method="POST" class="form-tag">
                    <label for="tagName">Tag mới</label>
                    <?php if (!empty($msg))
                        echo '<span>Tag đã tồn tại</span>';
                    ?>
                    <input type="text" id="tagName" placeholder="Nhập tên" name="tag_name" required>
                    <input type="submit" value="Thêm tag" class="btn" name="btn-submit">
                </form>


            </section>
        </div>

    </main>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>