<?php
    require '../../path.php';
    require_once ROOT_PATH .'/app/controllers/users.php';
    if (!isset($_SESSION['canAccess']) || $_SESSION['board'] !== 1) {
        echo("<script>location.href = '../../login.php';</script>");
            // header("location: ../../login.php");
    }
    
    require_once ROOT_PATH .'/app/database/admin.php';
    
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
                    <h4 class="title-manage">Quản lý các mod khác</h4>
                    <a href="register.php" class="btn-create">Thêm admin</a>
                    <table class="tags">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th colspan="2">Tác vụ</th>
                        </tr>

                        <?php $i = 0;
                            foreach ($users as $user) : ?>
                                <?php if($user[ADMIN_PROPERTY] === 1 || $user[ADMIN_PROPERTY] === 2) : ?>
                                    <tr>
                                        <td><?php echo $i + 1 ?></td>
                                        <td class="input-tag"><?php echo $user[USERNAME_PROPERTY] ?></td>
                                        
                                        <?php if($user[ADMIN_PROPERTY] === 1): ?>
                                            <td></td>
                                            <td></td>
                                        <?php else: ?>
                                            <td class="edit">
                                                <form action="index.php" method="POST">
                                                    <label for="permissions">Sửa quyền</label>
                                                    <input type="hidden" name="admin" value="<?php echo $user['id'] ?>">
                                                    <select name="new-permission" id="permissions">
                                                        <option value="1" <?php echo $user[ADMIN_PROPERTY] === 1 ? 'selected' : ''?> >
                                                            Admin
                                                        </option>
                                                        <option value="2" <?php echo $user[ADMIN_PROPERTY] === 2 ? 'selected' : ''?> >
                                                            Mod
                                                        </option>
                                                    </select>
                                                    <input type="submit" name="change-permission" value="Đổi">
                                                </form>
                                                
                                            </td>
                                            <td class="delete">
                                                <form action="index.php" method="POST">
                                                    <input type="hidden" value="<?php echo $user['id'] ?>" name="user-id">
                                                    <input type="submit" value="Xóa" name="btn-delete-user" class="delete-btn-user">
                                                </form>
                                        
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endif; ?>
                                <?php $i++; ?>

                            <?php endforeach ?>
                    </table>
                </div>


            </section>
        </div>
    </main>
    <script src="../../assets/js/script.js"></script>
</body>