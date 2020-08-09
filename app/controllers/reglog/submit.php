<?php

$mode = $_REQUEST['mode'];

switch ($mode){
    case'register':
        $id = mysql_insert($conn, 'users', ['email','password'], [$_REQUEST['email'],myhash($_REQUEST['password'])]);
        $_SESSION['auth']['user_id'] = $id;
        break;
    case'login':
        $password = myhash($_REQUEST['password']);
        $email = addslashes($_REQUEST['email']);
        $id = mysql_select_one($conn, "SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password';");
        if (empty($id))
        {
            $_SESSION['error'] = "wrong Email or password!";
            header('Location:/login');
            die();
        }
        $_SESSION['auth']['user_id'] = $id;
        break;
    default:
        //BOOGH
}

header('Location:/admin/profile');
