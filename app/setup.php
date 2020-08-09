<?php
include_once __DIR__ . '/functions.php';

$env=env_parser();
$conn = mysql_connect($env['DB_USER'], $env['DB_PASS'], $env['DB_NAME'],);


mysql_drop_table($conn, 'users');
mysql_drop_table($conn, 'projects');

mysql_create_table($conn, 'users', [
    '`id` INT(2) AUTO_INCREMENT PRIMARY KEY',
    '`name` VARCHAR(150)',
//    '`name` VARCHAR(150) NOT NULL',
    '`email` VARCHAR(150) NOT NULL UNIQUE',
    '`password` VARCHAR(255) NOT NULL',
    '`slogan` TEXT',
    '`picture` VARCHAR(255)',
    '`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    '`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
]);

mysql_create_table($conn, 'projects', [
    '`id` INT(5) AUTO_INCREMENT PRIMARY KEY',
    '`name` VARCHAR(200)',
//    '`name` VARCHAR(200) NOT NULL',
    '`user_id` INT(2) NOT NULL',
    '`picture` VARCHAR(255)',
    '`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    '`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
]);

mysql_insert($conn, 'users', ['name', 'email', 'password', 'slogan'], ['My Full Name', 'user@example.com', myhash('SVt7CTnKp\3p}"~_'), 'ticket']);
for ($i = 1; $i <= 10; $i++) {
    mysql_insert($conn, 'projects', ['name', 'user_id'], ["project$i", 1]);
}