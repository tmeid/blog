<?php
    require_once ROOT_PATH . '/app/controllers/posts.php';
    
    function postValidation($data, &$errors){
        if(empty($data[TITLE_PROPERTY])){
            $errors[TITLE_PROPERTY] = 'Chưa nhập tiêu đề';
        }else{
            $titleExists = valueAlreadyExists(POST_TABLE, TITLE_PROPERTY, $_POST);
            // create: cant create post with existed title
            // edit: cant rename a post with the same name as another already existed in db
            if(!empty($titleExists)){
                if(isset($_POST['btn-create-post'])
                    || ($titleExists['id'] != $data['id'])){
                        $errors[TITLE_PROPERTY] = 'Tiêu đề đã tồn tại';
                }   
                
            }
        }

        if(empty($data[CONTENT_PROPERTY])){
            $errors[CONTENT_PROPERTY] = 'Chưa nhập nội dung';
        }
        if(empty($data[CATEGORY_ID_PROPERTY])){
            $errors[CATEGORY_ID_PROPERTY] = 'Chưa chọn chuyên mục';
        }
        if(empty($data[TAG_ID_PROPERTY])){
            $errors[TAG_ID_PROPERTY] = 'Chưa chọn tag';
        }
    }


?>