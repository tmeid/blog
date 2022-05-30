<?php
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';

    define('CATEGORY_TABLE', 'category');
    define('CATEGORY_NAME_PROPERTY', 'name');
    
    $msg = '';
    $categories = selectAll(CATEGORY_TABLE);


    if(isset($_POST['btn-submit'])){
        unset($_POST['btn-submit']);

        if(!empty(valueAlreadyExists(CATEGORY_TABLE, CATEGORY_NAME_PROPERTY, $_POST))){
            $msg = true;
        }else{          
            $categoryId = create(CATEGORY_TABLE, [CATEGORY_NAME_PROPERTY => $_POST[CATEGORY_NAME_PROPERTY]]);
            //reload page
            echo "<meta http-equiv='refresh' content='0'>";
        }

        
    }

    //update tag
    if(isset($_POST['edited-tag-btn'])){
        $categoryId = $_POST['tag-id'];
        unset($_POST['cancel-edit-btn'], $_POST['edited-tag-btn'], $_POST['tag-id']);
        update(CATEGORY_TABLE, $categoryId, [CATEGORY_NAME_PROPERTY => $_POST['edit-tag']]);
        echo "<meta http-equiv='refresh' content='0'>";

    }

    //delete tag

    if(isset($_POST['delete-btn'])){
        $categoryId = $_POST['category-id'];
        unset($_POST['delete-btn']);
        delete(CATEGORY_TABLE, $categoryId);
        echo "<meta http-equiv='refresh' content='0'>";
    }

?>
