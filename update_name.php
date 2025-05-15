<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: phone.php");
    exit;
}

$first = trim($_POST['first_name']);
$last = trim($_POST['last_name']);
$user_id = $_SESSION['user_id'];

// به‌روزرسانی اطلاعات
$stmt = $conn->prepare("UPDATE users SET user_first_name = ?, user_last_name = ? WHERE user_id = ?");
$stmt->bind_param('ssi', $first, $last, $user_id);
$stmt->execute();

header("Location: dashboard.php?success=1");
exit;
