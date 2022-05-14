<?php
header('Content-type: application/json');

require_once '../configs/config.php';
require_once './Db.php';

$username = $mysqli->real_escape_string($_POST['username']);
$password = $mysqli->real_escape_string($_POST['password']);
// echo "$username/$password";
$sqlStr = "SELECT * FROM user WHERE username = '$username'";
// echo $sqlStr;
$userItems = $mysqli->query($sqlStr);
$item = $userItems->fetch_assoc();
if ($item) {
    // echo $password . " " . $item['password'];
    if (password_verify($password, $item['password'])) {
        session_start();
        $_SESSION['id'] = $item['id'];
        $_SESSION['username'] = $item['username'];
        $_SESSION['name'] = $item['name'];
        $_SESSION['role'] = $item['role'];
        $returnMsg = ["title" => "สำเร็จ!", 'msg' => "สำเร็จ!", "status" => "success"];
    } else {
        $returnMsg = ["title" => "ผิดพลาด!", 'msg' => "รหัสผ่านไม่ถูกต้อง!", "status" => "error"];
    }
} else {
    $returnMsg = ["title" => "ผิดพลาด!", 'msg' => "ไม่พบชื่อผู้ใช้นี้!", "status" => "error"];
    // echo $mysqli->error;
    // username not match
    // header("location: ../pages/users/");
}
echo json_encode($returnMsg);
// print_r($_POST);
