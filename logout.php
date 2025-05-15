<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: phone.php");
    exit;
}
session_destroy();
header("Location: index.php");
exit;