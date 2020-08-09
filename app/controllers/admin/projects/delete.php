<?php

$user_id = check_auth();

$projects_information = mysql_select_all($conn, $sql = "SELECT * FROM `projects` WHERE `user_id`='$user_id';");

include_once(base_dir('views/admin/projects-list.php'));