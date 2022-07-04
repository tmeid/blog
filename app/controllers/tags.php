<?php
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';
    require_once ROOT_PATH .'/app/assistance/slug.php';
    require_once ROOT_PATH .'/app/controllers/bootstrap.php';

    define('TAG_TABLE', 'tag');
    define('TAG_NAME_PROPERTY', 'tag_name');
    
    $msg = '';
    $tags = selectAll(TAG_TABLE);

    if(isset($_POST['btn-submit'])){
        unset($_POST['btn-submit']);

        if(!empty(valueAlreadyExists(TAG_TABLE, TAG_NAME_PROPERTY, $_POST))){
            $msg = true;
        }else{  
            // create a slug
            $slug = create_slug($_POST[TAG_NAME_PROPERTY]);        
            $tagId = create(TAG_TABLE, [TAG_NAME_PROPERTY => $_POST[TAG_NAME_PROPERTY],
                                        'slug' => $slug]);
            //reload page
            echo "<meta http-equiv='refresh' content='0'>";
        }

        
    }

    //update tag
    if(isset($_POST['edited-tag-btn'])){
        $tagId = $_POST['tag-id'];
        // unset($_POST['cancel-edit-btn'], $_POST['edited-tag-btn'], $_POST['tag-id']);
        $slug = create_slug($_POST['edit-tag']);
        update(TAG_TABLE, $tagId, [TAG_NAME_PROPERTY => $_POST['edit-tag'],
                                    'slug' => $slug]);
        echo "<meta http-equiv='refresh' content='0'>";

    }

    //delete tag

    if(isset($_POST['delete-btn'])){
        $tagId = $_POST['tag-id'];
        unset($_POST['delete-btn']);
        delete(TAG_TABLE, $tagId);
        echo "<meta http-equiv='refresh' content='0'>";
    }

