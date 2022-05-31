<?php

function valueAlreadyExists($table, $property, $data){
    $existValue = selectOne($table, [$property => $data[$property]]);
    return $existValue;
    
}

function validation($data, &$errors){
    $regUsername = "/^(?!.*\s)(?=[a-z])\d?.{3,}/i";         
    // missed the name field
    // remove whitespaces in username:
    $data['username'] = trim($data['username']);
    
    if (empty($data['username']) || !preg_match($regUsername, $data['username'])) {
        $errors['username'] = 'Username không hợp lệ';
    }else{
        // username is valid
        // check username already exists?
        $usernameExist = valueAlreadyExists('user', 'username', $data);
        if($usernameExist){
            $errors['username'] = 'Username đã tồn tại';
        }

    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Định dạng email không hợp lệ';
    }else{
        // email is valid
        // check email already exists?
        $emailExist = valueAlreadyExists('user', 'email', $data);
        if($emailExist){
            $errors['email'] = 'Email đã tồn tại';
        }
    }
    if(empty($_POST['password']) || $data['password'] !== $data['psw-repeat']){
        $errors['is-same-pass'] = 'Chưa nhập mật khẩu hoặc mật khẩu không trùng nhau';
    }

}

function validateLogin($data, &$errors){
    if (empty($data['username'])) {
        $errors['username'] = 'Chưa nhập username';
    }
    if(empty($_POST['password'])){
        $errors['pass'] = 'Chưa nhập mật khẩu';
    }
}
