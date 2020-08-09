<?php


include_once __DIR__ . '/functions.php';


@session_start();

$env = env_parser();
$conn = mysql_connect($env['DB_USER'], $env['DB_PASS'], $env['DB_NAME'],);


$uri = $_SERVER['REQUEST_URI'];
$uri = explode('?', $uri, 2);
$uri = explode('/', $uri[0]);

switch ($uri[1]) {
    case'':
    case'index':
    case'home':
        require_once(base_dir('app/controllers/interface/home.php'));
        break;

    case'login':
        require_once(base_dir('app/controllers/reglog/login.php'));
        break;

    case'logout':
        unset($_SESSION['auth']['user_id']);
        header('Location:/');
        break;

    case'register':
        require_once(base_dir('app/controllers/reglog/register.php'));
        break;

    case'reglog_submit':
        require_once(base_dir('app/controllers/reglog/submit.php'));
        break;

    case'admin':
        switch ($uri[2]) {
            case'profile':
                require_once(base_dir('app/controllers/admin/profile.php'));
                break;

            case'projects':
                if (isset($uri[3])) {
                    switch ($uri[3]) {
                        case'submit':
                            require_once(base_dir('app/controllers/admin/projects/submit.php'));
                            break;
                        case'edit':
                            require_once(base_dir('app/controllers/admin/projects/edit.php'));
                            break;
                        case'delete':
                            require_once(base_dir('app/controllers/admin/projects/delete.php'));
                            break;
                    }
                } else {
                    require_once(base_dir('app/controllers/admin/projects.php'));
                }
                break;

            case (preg_match('/submit.*/m', $uri[2]) ? true : false) :
            case'submit':
                require_once(base_dir('app/controllers/admin/submit.php'));
                break;

            default:
                header("HTTP/1.0 404 Not Found");
                die("page not found");
        }
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        die("page not found");
}