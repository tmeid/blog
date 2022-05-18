<?php 
    require 'app/database/admin.php';
    require 'app/assistance/permission.php'
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard | tmeid's Blog</title>
</head>

<body>
    <header>
        <nav class="dashboard-nav">
            <h1><a href="index.php"><img src="assets/imgs/tmeid-logo.jpg" alt="tmeid-logo">tmeid</a></h1>
            <h2>Dashboard</h2>
            <div class="admin">
                <span><?php echo $_SESSION['username']  ?></span>
                <span><a href="logout.php">Thoát</a></span>
            </div>
        </nav>
    </header>
    <main>
        <div class="dashboard">
            <nav class="manage">
                <ul>
                    <li><a href="#">Quản lý tag</a></li>
                    <li><a href="#">Quản lý chuyên mục</a></li>
                    <li><a href="#">Quản lý bài viết</a></li>
                    <?php if ($_SESSION['username'] === OWNER) : ?>
                        <li><a href="#">Quản lý admin</a></li>
                    <?php endif ?>
                </ul>
            </nav>
            <section class="dashboard-data">
                <div>
                    <a href="admin/tag/create.php" class="create-btn">Thêm tag</a>
                </div>
                <div>
                    <h4 class="title-manage">Quản lý tag</h4>
                    <table class="tags">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th colspan="2">Tác vụ</th>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Xác suất thống kê</td>
                            <td class="edit"><a href="#">Sửa</a></td>
                            <td class="delete"><a href="#">Xóa</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Toeic</td>
                            <td><a href="#">Sửa</a></td>
                            <td><a href="#">Xóa</a></td>
                        </tr>
                    </table>
                </div>
                
            </section>
        </div>

    </main>
</body>

</html>