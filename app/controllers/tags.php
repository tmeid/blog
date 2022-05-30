<?php
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';

    define('TAG_TABLE', 'tag');
    define('TAG_NAME_PROPERTY', 'tag_name');
    
    $msg = '';
    $tags = selectAll(TAG_TABLE);

    if(isset($_POST['btn-submit'])){
        unset($_POST['btn-submit']);

        if(!empty(valueAlreadyExists(TAG_TABLE, TAG_NAME_PROPERTY, $_POST))){
            $msg = true;
        }else{          
            $tagId = create(TAG_TABLE, [TAG_NAME_PROPERTY => $_POST[TAG_NAME_PROPERTY]]);
            //reload page
            echo "<meta http-equiv='refresh' content='0'>";
        }

        
    }

    //update tag
    if(isset($_POST['edited-tag-btn'])){
        $tagId = $_POST['tag-id'];
        unset($_POST['cancel-edit-btn'], $_POST['edited-tag-btn'], $_POST['tag-id']);
        update(TAG_TABLE, $tagId, [TAG_NAME_PROPERTY => $_POST['edit-tag']]);
        echo "<meta http-equiv='refresh' content='0'>";

    }

    //delete tag

    if(isset($_POST['delete-btn'])){
        $tagId = $_POST['tag-id'];
        unset($_POST['delete-btn']);
        delete(TAG_TABLE, $tagId);
        echo "<meta http-equiv='refresh' content='0'>";
    }

?>