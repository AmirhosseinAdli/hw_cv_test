<?php
$user_information = mysql_select_all($conn, "SELECT * FROM `users` WHERE `id` = 1", true);
$user_information = $user_information[0];
$user_information['picture'] ??= 'https://i.ibb.co/f9n56R3/young-boy-in-jacket-holding-white-flower-pot-3771640.jpg';
$projects_information = mysql_select_all($conn, "SELECT * FROM `projects` WHERE `user_id`=1");
//bala mysql_select bood ke tabdil kardam be mysql_select_all
include (base_dir('views/profile.php'));