<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
}

if ($_SESSION['role'] !== 'Super Admin') {
    header("Location: ../dashboard/index.php");
}
