<?php
require_once '../configs/config.php';
require_once './Db.php';

$id = $mysqli->real_escape_string($_POST['id']);

$sqlStr = "DELETE FROM user WHERE id=$id";

if (!$mysqli->query($sqlStr)) {
    echo $mysqli->error;
}