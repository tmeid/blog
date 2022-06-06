<form action="#" class="search" method="POST">
    <input type="text" placeholder="Tìm kiếm..." name="search">
    <!-- <input type="search" name="search" placeholder="&#128270;"> -->
</form>
<div>
    <h4 class="tag-header">Tags</h4>
    <?php foreach($tags as $tag): ?>
        <a href="<?php echo 'tag/' .$tag['slug']?>" class="tag"><?php echo $tag['tag_name'] ?></a>
    <?php endforeach ?>
</div>
<div>
    <h4 class="tag-header">Chuyên mục</h4>
    <?php foreach($categories as $category): ?>
        <a href="<?php echo 'category/' .$category['slug']?>" class="category"><?php echo $category['name'] ?></a>
    <?php endforeach ?>
</div>
<div class="brief">
    <h4 class="tag-header">Về mình</h4>
    <div>
        <img src="assets/imgs/chimrtr.jpg" alt="ten-blog">
    </div>
    <p>Xin chào mình là Diễm Thúy.</p><br>
    <p>Nhận thấy sự khó khăn của việc tự học lập trình, mình viết trang này với mục đích tổng hợp và chia sẻ các kiến thức nền tảng cơ bản.</p><br>
    <p>Hi vọng trang web sẽ hữu ích cho các bạn trái ngành có đam mê lập trình (như mình) ^^ </p><br>
    <p><a href="about-me.html">Đọc thêm về mình và blog tại đây.</a></p>
</div>