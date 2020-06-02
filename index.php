<?php
session_start();
$_SESSION['user_id'] = 1;
$session_id = $_SESSION['user_id'];

require_once './app/class/DB.php';
$db = new DB('localhost','simple_chat','root','password','utf8mb4');
$query = "  SELECT * FROM `users` WHERE id = ?";
$val = [$session_id];

$user = $db->row($query,$val);
$id = $user->id;
require_once './app/head.php';
require_once './app/sidebar.php';
require_once './app/components/view.php';
require_once './app/foot.php';




?>


