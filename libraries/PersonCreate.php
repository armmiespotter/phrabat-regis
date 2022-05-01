<?php
require_once '../configs/config.php';
require_once './Db.php';

// Profile
$firstname = $mysqli->real_escape_string($_POST['firstname']);
$lastname = $mysqli->real_escape_string($_POST['lastname']);
$age = $mysqli->real_escape_string($_POST['age']);
$degree = $mysqli->real_escape_string($_POST['degree']);
$career = $mysqli->real_escape_string($_POST['career']);
$tel = $mysqli->real_escape_string($_POST['tel']);
$father_firstname = $mysqli->real_escape_string($_POST['father_firstname']);
$father_lastname = $mysqli->real_escape_string($_POST['father_lastname']);
$mother_firstname = $mysqli->real_escape_string($_POST['mother_firstname']);
$mother_lastname = $mysqli->real_escape_string($_POST['mother_lastname']);

// Image
if ($_FILES['image']['size'] != 0) {
    $image = mt_rand() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $uploadPath = '../images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
} else {
    $image = 'default.png';
}
// Address
$address = $mysqli->real_escape_string($_POST['address']);
$current_address = $mysqli->real_escape_string($_POST['current_address']);

// In
if (isset($_POST['is_enter'])) {
    echo 'test';
    $is_enter = true;
    $enter_reason = $mysqli->real_escape_string($_POST['enter_reason']);
    $enter_date = $mysqli->real_escape_string($_POST['enter_date']);
} else {
    $is_enter = false;
    $enter_reason = null;
    $enter_date = null;
}

// Out
if (isset($_POST['is_leave'])) {
    $is_leave = true;
    $leave_reason = $mysqli->real_escape_string($_POST['leave_reason']);
    $leave_date = $mysqli->real_escape_string($_POST['leave_date']);
} else {
    $is_leave = false;
    $leave_reason = null;
    $leave_date = null;
}

// Novice
if (isset($_POST['is_novice'])) {
    $is_novice = true;
    $novice_date = $mysqli->real_escape_string($_POST['novice_date']);
    $novice_patron = $mysqli->real_escape_string($_POST['novice_patron']);
    $novice_temple = $mysqli->real_escape_string($_POST['novice_temple']);
    $novice_address = $mysqli->real_escape_string($_POST['novice_address']);
} else {
    $is_novice = false;
    $novice_date = null;
    $novice_patron = null;
    $novice_temple = null;
    $novice_address = null;
}

// Monk
if (isset($_POST['is_monk'])) {
    $is_monk = true;
    $monk_date = $mysqli->real_escape_string($_POST['monk_date']);
    $monk_patron = $mysqli->real_escape_string($_POST['monk_patron']);
    $monk_temple = $mysqli->real_escape_string($_POST['monk_temple']);
    $monk_address = $mysqli->real_escape_string($_POST['monk_address']);
} else {
    $is_monk = false;
    $monk_date = null;
    $monk_patron = null;
    $monk_temple = null;
    $monk_address = null;
}

// Note
$note = $mysqli->real_escape_string($_POST['note']);

// Other
$create_by = $_SESSION['id'];
// $create_date = $mysqli->real_escape_string($_POST['create_date']);
$update_by = $_SESSION['id'];
// $update_date = $mysqli->real_escape_string($_POST['update_date']);
$sqlStr = "INSERT INTO person (
    `firstname`,
    `lastname`,
    `age`,
    `degree`,
    `career`,
    `tel`,
    `father_firstname`,
    `father_lastname`,
    `mother_firstname`,
    `mother_lastname`,
    `image`,
    `address`,
    `current_address`,
    `is_enter`,
    `enter_reason`,
    `enter_date`,
    `is_leave`,
    `leave_reason`,
    `leave_date`,
    `is_novice`,
    `novice_date`,
    `novice_patron`,
    `novice_temple`,
    `novice_address`,
    `is_monk`,
    `monk_date`,
    `monk_patron`,
    `monk_temple`,
    `monk_address`,
    `note`,
    `create_by`,
    `create_date`,
    `update_by`,
    `update_date`
) VALUES (
    '$firstname',
    '$lastname',
    '$age',
    '$degree',
    '$career',
    '$tel',
    '$father_firstname',
    '$father_lastname',
    '$mother_firstname',
    '$mother_lastname',
    '$image',
    '$address',
    '$current_address',
    '$is_enter',
    '$enter_reason',
    '$enter_date',
    '$is_leave',
    '$leave_reason',
    '$leave_date',
    '$is_novice',
    '$novice_date',
    '$novice_patron',
    '$novice_temple',
    '$novice_address',
    '$is_monk',
    '$monk_date',
    '$monk_patron',
    '$monk_temple',
    '$monk_address',
    '$note',
    '$create_by',
    NOW(),
    '$update_by',
    NOW()
)";

if (!$mysqli->query($sqlStr)) {
    echo $mysqli->error;
} else {
    header("location: ../pages/persons/");
}
