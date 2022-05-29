<?php
    include 'path.php';
    require 'app/controllers/users.php';
    if (isset($_SESSION['canAccess'])) {
        echo ("<script>location.href = 'dashboard';</script>");
    }
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
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <title>Đăng nhập | tmeid's Blog</title>
</head>

<body>

    <main>
        <div class="container">
            <form action="login.php" method="post" class='login-form'>
                <h3>Đăng nhập</h3>
                <ul class="<?php echo count($errors) === 0 ? '' : 'msg-error' ?>">
                    <?php if (count($errors) > 0) :  ?>
                        <?php foreach ($errors as $key => $error) :  ?>
                            <li><?php echo $error;          ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Nhập username" name="username" id="username" value="<?php echo $records['username'] ?>">

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="password" id="password" value="<?php echo $records['password'] ?>">

                <button type="submit" name="login-btn">Login</button>
            </form>
        </div>
    </main>
    <?php
    include 'app/blade/footer.html';
    ?>
</body>

</html>