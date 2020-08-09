<?php

$user_id = check_auth();

$update = true;
$has_picture = !empty($_FILES['picture']['name']);

if ($has_picture) {
    $target_dir = base_dir("public/uploads/profile/");
    $basefile = basename($_FILES["picture"]["name"]);
    $target_ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $basefile);
    $target_file = date('Ymd-His', time()) . '-' . rand(1, 100) . '.' . $target_ext;
    $target_path = $target_dir . '/' . $target_file;
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_path);
    if (!file_exists($target_path)) $update = false;
}

if ($update) {
    $_SESSION['isok'] = mysql_update(
        $conn,
        'users',
        ['name', 'slogan', 'picture'],
        [$_REQUEST['name'], $_REQUEST['slogan'], $target_file ?? ''],
//        '`id` = ' . $user_id
    "`id` = $user_id"
    );
}
//var_dump($update, $_REQUEST, $_SESSION['isok'], $user_id, );
//die('123');
header('Location:/admin/profile');