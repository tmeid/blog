<?php
    session_start();
    if (!isset($_SESSION['canAccess'])) {
        header("location: ../login.php");
    }
    include_once '../../path.php';
    require ROOT_PATH . '/app/database/admin.php';
    require ROOT_PATH . '/app/controllers/categories.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../../assets/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <title>Dashboard | Water that seed</title>
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
                    <h4 class="title-manage">Quản lý chuyên mục</h4>
                    <table class="tags">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th colspan="2">Tác vụ</th>
                        </tr>

                        <?php foreach ($categories as $i => $category) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td class="input-tag">
                                    <?php echo $category[CATEGORY_NAME_PROPERTY] ?>
                                    <form action="index.php" method="POST">
                                        <input type="text" name="edit-category" class="edit-btn" value="<?php echo $category[CATEGORY_NAME_PROPERTY] ?>">
                                        <input type="hidden" name="category-id" value="<?php echo $category['id'] ?>">
                                        <input type="submit" name="edited-category-btn" value="Oke">
                                        <button name="cancel-edit-btn" type="button" class="cancel-edit">&#128473;</button>
                                    </form>
                                </td>
                                <td class="edit"><a href="#">Sửa</a></td>
                                <td class="delete">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" value="<?php echo $category['id'] ?>" name="category-id">
                                        <input type="hidden" value="<?php echo $_SESSION['_token'] ?>" name="_token">
                                        <input type="submit" value="Xóa" name="delete-btn" class="delete-btn">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </table>
                </div>
                <form action="index.php" method="POST" class="form-tag">
                    <label for="categoryName">Chuyên mục</label>
                    <?php if (!empty($msg))
                        echo '<span>Chuyên mục đã tồn tại</span>';
                    ?>
                    <input type="text" id="categoryName" placeholder="Nhập tên" name="name" required>
                    <input type="submit" value="Thêm tag" class="btn" name="btn-submit">
                </form>


            </section>
        </div>

    </main>
    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>