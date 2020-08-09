<?php

$project_id = (int)$_GET['project_id'];

$project = mysql_select_one($conn, $sql = "SELECT * FROM `projects` WHERE `id` = $project_id;");

include_once(base_dir('views/admin/project-form.php'));