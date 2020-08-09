<?php

$update = true;
$has_picture = !empty($_FILES['picture']['name']);

if ($has_picture) {
    $target_dir = base_dir("public/uploads/projects/");
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
        'projects',
        ['name', 'picture'],
        [$_REQUEST['name'], $target_file ?? ''],
        '`id` = ' . (int)$_REQUEST["project_id"],
    );
}

header('Location:/admin/projects');