<?php
session_start();
if (!isset($_SESSION['canAccess'])) {
    echo ("<script>location.href = '../../login.php';</script>");
    // header("location: ../../login.php");
}
require '../../path.php';
require_once ROOT_PATH . '/app/database/admin.php';
require_once ROOT_PATH . '/app/controllers/posts.php';
require_once ROOT_PATH . '/app/controllers/categories.php';
require_once ROOT_PATH . '/app/controllers/tags.php';


// var_dump($post);
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
    <link rel="stylesheet" href="../../assets/css/login.css" type="text/css">
    <script src="https://cdn.tiny.cloud/1/n4xefeurkjusm2nc16n44s8wr6x8sdj5a6ahkouj6p7z1bg1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Dashboard | tmeid's Blog</title>
    <script>
        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({
                        message: 'HTTP Error: ' + xhr.status,
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        });

        tinymce.init({
            selector: '.post-content', // note the comma at the end of the line!
            plugins: 'code',
            entity_encoding: 'raw',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents language undo redo  styles  bold italic  alignleft aligncenter alignright alignjustify outdent indent  image',
            toolbar_mode: 'floating',
            images_upload_url: 'upload.php',
            images_upload_handler: image_upload_handler_callback,
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Thuy Huynh',
        });
    </script>
</head>

<body>
    <header>
        <?php include ROOT_PATH . '/app/blade/header_dashboard.php' ?>
    </header>
    <main>
        <div class="dashboard">
            <?php include '../../app/blade/nav_dashboard.php' ?>
            <section class="dashboard-data">

                <form action="edit.php" method="POST" class="create-post" enctype="multipart/form-data">
                    <h3>Sửa bài</h4>

                        <ul class="<?php echo count($errors) === 0 ? '' : 'msg-error' ?>">
                            <?php if (count($errors) > 0) :  ?>
                                <?php foreach ($errors as $key => $error) :  ?>
                                    <li><?php echo $error;          ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                        <label for="titleName">Tên bài</label>
                        <input type="text" id="titleName" placeholder="Nhập tên" name="title" value="<?php echo $post[TITLE_PROPERTY] ?>">
                        <label for="img">Ảnh</label>
                        <input type="file" name="img" id="img">

                        <label for="des">Mô tả</label>
                        <textarea type="text" cols="30" rows="5" id="des" placeholder="Nhập mô tả" name="description" value="<?php echo $post[DESCRIPTION_PROPERTY] ?>"></textarea>

                        <input type="hidden" name="author_id" value="<?php echo $_SESSION['admin-id']  ?>">
                        <label for="category" class="label-category">Chuyên mục</label>
                        <select name="category_id" id="category">
                            <option value=""></option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id'] ?>" <?php echo $post[CATEGORY_ID_PROPERTY] == $category['id'] ? 'selected' : '' ?>>
                                    <?php echo $category[CATEGORY_NAME_PROPERTY] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <h5>Tags</h5>
                        <?php foreach ($tags as $tag) : ?>
                            <input type="checkbox" id="<?php echo $tag[TAG_NAME_PROPERTY] ?>" name="tag_id[]" value="<?php echo $tag['id'] ?>" <?php if (!empty($_POST[TAG_ID_PROPERTY]))
                                                                                                                                                    echo in_array($tag['id'], $_POST[TAG_ID_PROPERTY]) ? 'checked' : ''
                                                                                                                                                ?>>
                            <label for="<?php echo $tag[TAG_NAME_PROPERTY] ?>"><?php echo $tag[TAG_NAME_PROPERTY] ?></label>
                        <?php endforeach; ?>
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="post-content"><?php echo $post[CONTENT_PROPERTY] ?></textarea>
                        <input type="submit" value="Sửa bài viết" class="btn" name="btn-edit-post">
                </form>


            </section>
        </div>
    </main>
    <script src="../../assets/js/script.js"></script>
</body>