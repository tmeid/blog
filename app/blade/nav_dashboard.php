<nav class="manage">
    <ul>
        <li><a href="../../dashboard">Quản lý tag</a></li>
        <li><a href="../categories">Quản lý chuyên mục</a></li>
        <li><a href="../posts">Quản lý bài viết</a></li>
        <?php if ($_SESSION['board'] === OWNER) : ?>
            <li><a href="../admins">Quản lý admin</a></li>
        <?php endif ?>
    </ul>
</nav>