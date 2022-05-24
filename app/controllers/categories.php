<?php
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';

    define('TABLE_NAME2', 'category');
    define('CATEGORY_NAME_PROPERTY', 'name');
    
    $msg = '';
    $categories = selectAll(TABLE_NAME2);



?>