<?php
require_once './app/class/DB.php';
$db = new DB('localhost','simple_chat','root','password','utf8mb4');
require_once './app/head.php';
require_once './app/sidebar.php';
require_once './app/components/view.php';
require_once './app/foot.php';
?>


