<?php

require_once ROOT_PATH . '/app/database/db.php';
require_once ROOT_PATH . '/app/assistance/validation.php';
require_once ROOT_PATH . '/app/controllers/tags.php';
require_once ROOT_PATH . '/app/assistance/postValidation.php';

// tables' names, properties of those tables
define('POST_TABLE', 'post');
define('TITLE_PROPERTY', 'title');
define('CONTENT_PROPERTY', 'content');
define('PUBLISHED_PROPERTY', 'published');

define('POST_TAG_TABLE', 'post_tag');
define('CATEGORY_ID_PROPERTY', 'category_id');
define('IMG_PROPERTY', 'img');
define('POST_ID_PROPERTY', 'post_id');
define('TAG_ID_PROPERTY', 'tag_id');
// when user uploads img, move this to folder below 
define('FOLDER_UPLOAD_IMG', '/assets/imgs/');

// on edit post route, no need to get all post  
if (empty($_GET['id'])) {
    $posts = selectAll(POST_TABLE);
}


// holds all input data if form is unvalid
// user dont need to rewrite
$post = [
    TITLE_PROPERTY => '',
    IMG_PROPERTY => '',
    CATEGORY_ID_PROPERTY => '',
    TAG_ID_PROPERTY => [],
    CONTENT_PROPERTY => ''
];


// collect error of input fields 
$errors = [];

function genNewNameIfExist($img_name)
{
    while (file_exists(ROOT_PATH . FOLDER_UPLOAD_IMG . $img_name)) {
        $img_name = 'b' . $img_name;
    }
    return $img_name;
}
function uploadImg($img, &$errors, $data)
{
    if (!empty($img['name'])) {
        $img_uploaded_name = genNewNameIfExist($img['name']);
        $upload_img_status = move_uploaded_file($img['tmp_name'], ROOT_PATH . FOLDER_UPLOAD_IMG . $img_uploaded_name);
        if ($upload_img_status) {
            // add img key and its value to $_POST
            $_POST[IMG_PROPERTY] = $img_uploaded_name;
        } else {
            $errors[IMG_PROPERTY] = 'Upload ảnh lên không thành công';
        }
    } else if (empty($data['id'])) {
        // check if whether $post[IMG_PROPERTY] exists
        // if exists ==> dont need 
        //img is optional when update post, so img field wont get error
        $errors[IMG_PROPERTY] = 'Thiếu ảnh';
    }
}
function holdValues(&$a, $data, $id = '')
{
    $a[TITLE_PROPERTY] = $data[TITLE_PROPERTY];
    $a[CATEGORY_ID_PROPERTY] = $data[CATEGORY_ID_PROPERTY];
    $a[CONTENT_PROPERTY] = $data[CONTENT_PROPERTY];
    $a[PUBLISHED_PROPERTY] = $data[PUBLISHED_PROPERTY];

    if (!empty($id)) {
        $a[$id] = $data[$id];
    }
    if (array_key_exists(TAG_ID_PROPERTY, $_POST)) {
        $a[TAG_ID_PROPERTY] = $data[TAG_ID_PROPERTY];
    }
}

function updateTag($table, $post_id, $new_tags){
    $old_tags_same_post = selectAll($table, [POST_ID_PROPERTY => $post_id]);
    
    $tag_id_record_id = [];
    // $tag_id_record_id with format ['tag_id' => 'id_of_record_contains_this_tag_id'] (tag_id: number)
    // Ex: ["3" => "20"]
    // need id_of_post_include_this_tag_id to delete action
    if(!empty($new_tags)){
        if(empty($old_tags_same_post)){
            foreach($new_tags as $i => $new_tag_id){
                $new_post_id = create(POST_TAG_TABLE, [POST_ID_PROPERTY => $post_id,
                                                        TAG_ID_PROPERTY => $new_tag_id
                                                        ]);
            }
        }else{
            foreach($old_tags_same_post as $post){
                $tag_id_record_id[$post[TAG_ID_PROPERTY]] = $post['id'];
            }
            // var_dump($tag_id_record_id);
      
            foreach($tag_id_record_id as $old_tag_id => $record_id){
                if(!in_array($old_tag_id, $new_tags)){
                    delete(POST_TAG_TABLE, $record_id);
                }else{
                    $record_index_in_new_tags = array_search($old_tag_id, $new_tags);
                    unset($new_tags[$record_index_in_new_tags]);
                }              
            }
            // var_dump($new_tags);
            if(!empty($new_tags)){
                foreach($new_tags as $i => $new_tag_id){
                    $new_post_id = create(POST_TAG_TABLE, [POST_ID_PROPERTY => $post_id,
                                                            TAG_ID_PROPERTY => $new_tag_id
                                                            ]);
                }
            }
        }
        
    }
    


    // if(!empty($new_tags)){
    //     foreach($old_tags as $old_tag){
    //         if(!in_array($old_tags, $new_tags)){
    //             delete($table, []);
    //         }
    //     }
    // }

}

if (isset($_POST['btn-create-post'])) {
    postValidation($_POST, $errors);

    // img is required when user creates a post
    // but img is optional when update post

    // if user has uploaded img
    $img = $_FILES[IMG_PROPERTY];
    uploadImg($img, $errors, $_POST);

    if (count($errors) === 0) {
        $tags_id = $_POST[TAG_ID_PROPERTY];

        unset($_POST['btn-create-post'], $_POST[TAG_ID_PROPERTY]);
        $_POST[PUBLISHED_PROPERTY] = 1;
        $new_post_id = create(POST_TABLE, $_POST);

        // insert pairs of (post_id, tag_id) into post_tag table
        foreach ($tags_id as $i => $tag_id) {
            $new_post_tag_id = create(POST_TAG_TABLE, [
                POST_ID_PROPERTY => $new_post_id,
                TAG_ID_PROPERTY => $tag_id
            ]);
        }
        echo ("<script>location.href = '../../dashboard/posts';</script>");
        // header('location: ../../dashboard/posts');
    } else {
        holdValues($post, $_POST);
    }
}


if (isset($_GET['id'])) {
    // override $post above, assign values for keys
    // because in the form, i used $post to display information about current post need to edit
    $record = selectOne(POST_TABLE, ['id' => $_GET['id']]);

    holdValues($post, $record);
    $post['id'] = $record['id'];


    // get id of post after query statement above
    // pass id to form with type = hidden
    // after submit form, if error occurs, ?id=anynumber will dissappear 
    // ==> so we need pass $id_post by $_POST

    $tags_in_a_post = joinTables(
        POST_TABLE,
        POST_TAG_TABLE,
        TAG_TABLE,
        'id',
        POST_ID_PROPERTY,
        TAG_ID_PROPERTY,
        'id',
        'id',
        $post['id']
    );
    //stores result in array that only includes values of tags 
    // assign to $_POST[TAG_ID_PROPERTY]: in edit.php this variable holds all tags id the current post has
    $_POST[TAG_ID_PROPERTY] = array_column($tags_in_a_post, 'id');
}

if (isset($_POST['btn-edit-post'])) {
    postValidation($_POST, $errors);
    // img is required when user creates a post
    // but img is optional when update post

    // if user has uploaded img
    $img = $_FILES[IMG_PROPERTY];
    uploadImg($img, $errors, $_POST);

    if (count($errors) === 0) {
        $new_tags_id = $_POST[TAG_ID_PROPERTY];
        $id = $_POST['id'];

        updateTag(POST_TAG_TABLE, $_POST['id'], $new_tags_id);
        unset($_POST['id'], $_POST['btn-edit-post'], $_POST[TAG_ID_PROPERTY]);
        update(POST_TABLE, $id, $_POST);
  
        echo ("<script>location.href = '../../dashboard/posts';</script>");
    } else {
        holdValues($post, $_POST, 'id');
    }
}

if(isset($_POST['btn-delete-post'])){
    delete(POST_TABLE, $_POST['post-id']);
    echo "<meta http-equiv='refresh' content='0'>";

}

// toggle published/unpublished post
if(isset($_GET[PUBLISHED_PROPERTY]) && isset($_GET['id'])){
    // post table: published property has 2 values: 0 or 1
    // if current value = 1 ==> click ==> value will convert to 0 (1 - 1 = 0)
    // if current value = 0 ==> click ==> value will convert to 1 (1 - 0 = 0)
    update(POST_TABLE, $_GET['id'], [PUBLISHED_PROPERTY => 1 - $_GET[PUBLISHED_PROPERTY]]);
    echo ("<script>location.href = '../../dashboard/posts';</script>");
}
?>