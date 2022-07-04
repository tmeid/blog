<?php 
    session_start();
    require_once ROOT_PATH .'/app/database/db.php';
    require_once ROOT_PATH .'/app/assistance/validation.php';
    require_once ROOT_PATH .'/app/controllers/bootstrap.php';
    
    define('USER_TABLE', 'user');
    define('ADMIN_PROPERTY', 'admin');
    define('USERNAME_PROPERTY', 'username');
    define('EMAIL_PROPERTY', 'email');
    define('PASSWORD_PROPERTY', 'password');

    $users = selectAll(USER_TABLE);
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
            // decode the password
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id = create('user', $_POST);
            // var_dump(selectOne('user', ['id' => $id]));
            // die();
            echo("<script>location.href = 'index.php';</script>");
        }else{
            // form is unvalid: hold all input of user, improve user experience:
            $records['username'] = $_POST['username'];
            $records['email'] = $_POST['email'];
            $records['admin'] = $_POST['admin'];
            $records['password'] = $_POST['password'];
            $records['psw-repeat'] = $_POST['psw-repeat'];
        }
        
    }

    // user submit login form
    if(isset($_POST['login-btn'])){
        validateLogin($_POST, $errors);

        if(count($errors) === 0){
            $user = selectOne('user', ['username' => $_POST['username']]);
            // user exists, correct pass and has an admin role
            if(isset($user) && password_verify($_POST['password'], $user['password']) && $user['admin'] !== 0){
                // session_start();
                $_SESSION['canAccess'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['admin-id'] =  $user['id'];
                $_SESSION['board'] =  $user['admin'];
                echo("<script>location.href = 'dashboard';</script>");
                // header("location: dashboard");
            }else if(!isset($user)){
                $errors['match-user'] = "Tài khoản không tồn tại";
            }else if($user['admin'] === 0){
                $errors['match-user'] = "Bạn không có quyền";
            }
            else{
                $errors['match-user'] = "Username hoặc mật khẩu không đúng";
            }                     
        }
        // hold all input field if form is unvalid. Doesnt match any admin account
        $records['username'] = $_POST['username'];
        $records['password'] = $_POST['password'];
        
    }

    // soft delete user
    if(isset($_POST['btn-delete-user'])){
        update(USER_TABLE, $_POST['user-id'], [ADMIN_PROPERTY => 0]);
        echo "<meta http-equiv='refresh' content='0'>";
    }

    // change permission
    if(isset($_POST['change-permission'])){
        update(USER_TABLE, $_POST[ADMIN_PROPERTY], [ADMIN_PROPERTY => $_POST['new-permission']]);
        echo "<meta http-equiv='refresh' content='0'>";
    }

