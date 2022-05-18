<?php
    require 'app/database/db.php';
    require 'app/assistance/validation.php';

    
    // defautl value
    $records = [
        'username' => '',
        'email' => '',
        'password' => '',
        'psw-repeat' => ''
    ];

    $errors = [];
    

    if(isset($_POST['register-btn'])){
        validation($_POST, $errors);
        // if form is valid (0 errors)==> insert data into db
        // remove 2 keys below because users table doesnt need them
        if(count($errors) === 0){
            unset($_POST['psw-repeat'], $_POST['register-btn']);
            $_POST['admin'] = 1;
            // decode the password
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id = create('user', $_POST);
            var_dump(selectOne('user', ['id' => $id]));
            die();
        }else{
            // form is unvalid: hold all input of user, improve user experience:
            $records['username'] = $_POST['username'];
            $records['email'] = $_POST['email'];
            $records['password'] = $_POST['password'];
            $records['psw-repeat'] = $_POST['psw-repeat'];
        }
        
    }

    // user submit login form
    if(isset($_POST['login-btn'])){
        validateLogin($_POST, $errors);
        if(count($errors) === 0){
            $user = selectOne('user', ['username' => $_POST['username']]); 
            if(isset($user) && password_verify($_POST['password'], $user['password'])){
                session_start();
                $_SESSION['canAccess'] = true;
                $_SESSION['username'] = $user['username'];
                header("location: ./dashboard.php");
            }else{
                $errors['match-user'] = "Username hoặc mật khẩu không đúng";
            }                     
        }
        // hold all input if form is unvalid, doesnt match any admin account
        $records['username'] = $_POST['username'];
        $records['password'] = $_POST['password'];
        
    }



?>