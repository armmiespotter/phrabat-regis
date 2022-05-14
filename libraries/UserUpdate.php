<?php
session_start();
require_once '../configs/config.php';
require_once './Db.php';

// Profile
$id = $mysqli->real_escape_string($_POST['id']);
$username = $mysqli->real_escape_string($_POST['username']);

if ($_POST['password']) {
    $password = password_hash($mysqli->real_escape_string($_POST['password']), PASSWORD_BCRYPT, ['cost' => 12]);
}

$name = $mysqli->real_escape_string($_POST['name']);

$sqlStr = "UPDATE user SET
    `username` = '$username'
    ,`name` = '$name'";

if ($_POST['password']) {
    $sqlStr .= "\n,`password` = '$password'";
}

$sqlStr .= "\nWHERE id = $id";

if (!$mysqli->query($sqlStr)) {
    echo $mysqli->error;
} else {
    header("location: ../pages/users/");
}
