<?php
session_start();
require_once '../configs/config.php';
require_once './Db.php';

// Profile
$id = $mysqli->real_escape_string($_POST['id']);
$update_by = $mysqli->real_escape_string($_POST['user_id']);

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
}

// Address
$address = $mysqli->real_escape_string($_POST['address']);
$current_address = $mysqli->real_escape_string($_POST['current_address']);

// In
if (isset($_POST['is_enter'])) {
    $is_enter = 1;
    $enter_reason = $mysqli->real_escape_string($_POST['enter_reason']);
    $enter_date = $mysqli->real_escape_string($_POST['enter_date']);
} else {
    $is_enter = 0;
    $enter_reason = NULL;
    $enter_date = NULL;
}

// Out
if (isset($_POST['is_leave'])) {
    $is_leave = 1;
    $leave_reason = $mysqli->real_escape_string($_POST['leave_reason']);
    $leave_date = $mysqli->real_escape_string($_POST['leave_date']);
} else {
    $is_leave = 0;
    $leave_reason = NULL;
    $leave_date = NULL;
}

// Novice
if (isset($_POST['is_novice'])) {
    $is_novice = 1;
    $novice_date = $mysqli->real_escape_string($_POST['novice_date']);
    $novice_patron = $mysqli->real_escape_string($_POST['novice_patron']);
    $novice_temple = $mysqli->real_escape_string($_POST['novice_temple']);
    $novice_address = $mysqli->real_escape_string($_POST['novice_address']);
} else {
    $is_novice = 0;
    $novice_date = NULL;
    $novice_patron = NULL;
    $novice_temple = NULL;
    $novice_address = NULL;
}

// Monk
if (isset($_POST['is_monk'])) {
    $is_monk = 1;
    $monk_date = $mysqli->real_escape_string($_POST['monk_date']);
    $monk_patron = $mysqli->real_escape_string($_POST['monk_patron']);
    $monk_temple = $mysqli->real_escape_string($_POST['monk_temple']);
    $monk_address = $mysqli->real_escape_string($_POST['monk_address']);
} else {
    $is_monk = 0;
    $monk_date = NULL;
    $monk_patron = NULL;
    $monk_temple = NULL;
    $monk_address = NULL;
}

// Note
$note = $mysqli->real_escape_string($_POST['note']);

$sqlStr = "UPDATE person SET
    `firstname` = '$firstname'
    ,`lastname` = '$lastname'
    ,`age` = '$age'
    ,`degree` = '$degree'
    ,`career` = '$career'
    ,`tel` = '$tel'
    ,`father_firstname` = '$father_firstname'
    ,`father_lastname` = '$father_lastname'
    ,`mother_firstname` = '$mother_firstname'
    ,`mother_lastname` = '$mother_lastname'
    ,`address` = '$address'
    ,`current_address` = '$current_address'
    ,`is_enter` = $is_enter
    ,`enter_reason` = '$enter_reason'
    ,`enter_date` = " . ($enter_date == NULL ? "NULL" : "'$enter_date'") . "
    ,`is_leave` = $is_leave
    ,`leave_reason` = '$leave_reason'
    ,`leave_date` = " . ($leave_date == NULL ? "NULL" : "'$leave_date'") . "
    ,`is_novice` = $is_novice
    ,`novice_date` = " . ($novice_date == NULL ? "NULL" : "'$novice_date'") . "
    ,`novice_patron` = '$novice_patron'
    ,`novice_temple` = '$novice_temple'
    ,`novice_address` = '$novice_address'
    ,`is_monk` = $is_monk
    ,`monk_date` = " . ($monk_date == NULL ? "NULL" : "'$monk_date'") . "
    ,`monk_patron` = '$monk_patron'
    ,`monk_temple` = '$monk_temple'
    ,`monk_address` = '$monk_address'
    ,`note` = '$note'
    ,`update_by` = '$update_by'
    ,`update_date` = NOW()";

if ($_FILES['image']['size'] != 0) {
    $sqlStr .= "\n,`image` = '$image'";
}

$sqlStr .= "\nWHERE id = $id";
echo $sqlStr;
// if (!$mysqli->query($sqlStr)) {
//     echo $mysqli->error;
// } else {
//     header("location: ../pages/persons/");
// }
