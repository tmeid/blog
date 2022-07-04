<nav class="dashboard-nav">
    <h1 class="logo"><a href="../../index.html"><img src="../../assets/imgs/tmeid-logo.jpg" alt="tmeid-logo">tmeid</a></h1>
    <h2>Dashboard</h2>
    <div class="admin">
        <span><?php echo $_SESSION['username']  ?></span>
        <span><a href="../../logout.php">Thoát</a></span>
    </div>
    <div class="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>
<nav class="popup-menu">
    <ul>
        <li><a href="../../dashboard">Quản lý tag</a></li>
        <li><a href="../categories">Quản lý chuyên mục</a></li>
        <li><a href="../posts">Quản lý bài viết</a></li>
        <?php if ($_SESSION['board'] === OWNER) : ?>
            <li><a href="../admins">Quản lý admin</a></li>
        <?php endif ?>
    </ul>

</nav>