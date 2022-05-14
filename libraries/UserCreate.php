<?php
session_start();
require_once '../configs/config.php';
require_once './Db.php';

// Profile
$username = $mysqli->real_escape_string($_POST['username']);
$password = password_hash($mysqli->real_escape_string($_POST['password']), PASSWORD_BCRYPT, ['cost' => 12]);
$name = $mysqli->real_escape_string($_POST['name']);
$role = 'Author';

$sqlStr = "INSERT INTO user (
    `username`,
    `password`,
    `name`,
    `role`
) VALUES (
    '$username',
    '$password',
    '$name',
    '$role'
)";

if (!$mysqli->query($sqlStr)) {
    echo $mysqli->error;
} else {
    header("location: ../pages/users/");
}
