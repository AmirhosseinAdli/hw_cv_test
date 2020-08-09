<?php

$user_id = check_auth();

$profile = mysql_select_one($conn, "SELECT * FROM `users` WHERE `id`= $user_id LIMIT 1;");

include_once(base_dir('views/admin/profile.php'));
unset($_SESSION['isok']);