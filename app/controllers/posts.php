<?php
    
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';
    require_once ROOT_PATH .'/app/controllers/tags.php';
    require_once ROOT_PATH .'/app/assistance/postValidation.php';

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
    define('PUBLISHED', 'published');
    // 
    
    $msg = '';
    $posts = selectAll(POST_TABLE);

    // holds all input data if form is unvalid
    // user dont need to rewrite
    $records = [
        TITLE_PROPERTY => '',
        IMG_PROPERTY => '',
        CATEGORY_ID_PROPERTY => '',
        TAG_ID_PROPERTY => [],
        CONTENT_PROPERTY => ''
    ];

    // collect error of input fields 
    $errors = [];

    

   if(isset($_POST['btn-create-post'])){
        postValidation($_POST, $errors);

        if(count($errors) === 0){
            $tags_id = $_POST[TAG_ID_PROPERTY];

            unset($_POST['btn-create-post'], $_POST[TAG_ID_PROPERTY]);
            $_POST[PUBLISHED] = 1;
            $new_post_id = create(POST_TABLE, $_POST);
        
            foreach($tags_id as $i => $tag_id){
                $new_post_tag_id = create(POST_TAG_TABLE, [POST_ID_PROPERTY => $new_post_id,
                                                    TAG_ID_PROPERTY => $tag_id]); 
            }
            header('location: ../../dashboard/posts');
       }else{
            $records[TITLE_PROPERTY] = $_POST[TITLE_PROPERTY];
            $records[CATEGORY_ID_PROPERTY] = $_POST[CATEGORY_ID_PROPERTY];
            $records[CONTENT_PROPERTY] = $_POST[CONTENT_PROPERTY];
            $records[TAG_ID_PROPERTY] = $_POST[TAG_ID_PROPERTY];
       }
    
    

       
   }
