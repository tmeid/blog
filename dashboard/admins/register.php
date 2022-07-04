<?php
    include '../../path.php';
    require '../../app/controllers/users.php';
    require '../../app/database/admin.php';
    
    if (!isset($_SESSION['canAccess']) || $_SESSION['board'] !== OWNER)
        echo ("<script>location.href = '../../index.html';</script>");
    // header("location: index.php");


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
    <link rel="stylesheet" href="../../assets/css/dashboard.css" type="text/css">
    <title>Tạo thêm admin| tmeid's Blog</title>
</head>

<body>
    <header>
        <?php  include ROOT_PATH . '/app/blade/header_dashboard.php'; ?>
    </header>
    <main>
        <?php include '../../app/blade/nav_dashboard.php' ?>
        <div class="container">
            <form action="register.php" method="post" class='login-form register'>
                <h3>Đăng ký</h3>
                <ul class="<?php echo count($errors) === 0 ? '' : 'msg-error' ?>">
                    <?php if (count($errors) > 0) :  ?>
                        <?php foreach ($errors as $key => $error) :  ?>
                            <li><?php echo $error;          ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <label for="username">Username</label>
                <input type="text" placeholder="Nhập username" name="username" id="username" value="<?php echo $records['username'] ?>">
                <p class="username-rule">username có độ dài >= 3, bắt đầu bằng chữ cái, không chứa khoảng trắng </p>

                <label for="email">Email</label>
                <input type="mail" placeholder="Nhập email" name="email" id="email" value="<?php echo $records['email'] ?>">
                
                <label for="admin">Cấp quyền</label>
                <select name="admin" id="admin">
                    <option value="1">Tác giả</option>
                    <option value="2">Mod</option>
                </select>
                <label for="password">Mật khẩu</label>
                <input type="password" placeholder="Nhập mật khẩu" name="password" id="password" value="<?php echo $records['password'] ?>">

                <label for="psw-repeat">Nhập lại mật khẩu</label>
                <input type="password" placeholder="Nhập mật khẩu lại" name="psw-repeat" id="psw-repeat" value="<?php echo $records['psw-repeat'] ?>">


                <button type="submit" name="register-btn">Đăng ký</button>
            </form>
        </div>
    </main>
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>