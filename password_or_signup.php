<?php
session_start();
include "conn.php";

$phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
$redirect = $_POST['redirect'] ?? 'index.php';

// اگر کاربر وجود داشته باشه
$stmt = $conn->prepare("SELECT user_id FROM users WHERE user_phone = ?");
$stmt->bind_param('s', $phone);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows) {
    // موجود: درخواست پسورد
    $_SESSION['auth_phone'] = $phone;
    header("Location: password.php?redirect=$redirect");
} else {
    // جدید: ایمیل
    $_SESSION['auth_phone'] = $phone;
    header("Location: signup_email.php?redirect=$redirect");
}
exit;
?>