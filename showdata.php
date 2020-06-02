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

$suser_id = $_POST['uid'];

$query = "SELECT * FROM message WHERE myid=? AND uid=?";
$var = [$id,$suser_id];
$response  = $db->row_array($query,$var);

if ($response){
    echo json_encode([
        'status' => 1,
        'data' => $response
    ]);
}else{
    echo json_encode([
        'status' => 0,
        'msg' => 'Iltimos shoxlik qilmang',
        'data' => 'Object not found',
    ]);
}






?>


