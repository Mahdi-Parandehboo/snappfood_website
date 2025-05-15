<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['signup'])) header('Location: phone.php');
$data = $_SESSION['signup'];

$first = mysqli_real_escape_string($conn, $_POST['first_name']);
$last = mysqli_real_escape_string($conn, $_POST['last_name']);
$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (user_phone, user_email, user_first_name, user_last_name, user_password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $data['phone'], $data['email'], $first, $last, $pass_hash);
$stmt->execute();
$user_id = $stmt->insert_id;

// لاگین خودکار
$_SESSION['user_id'] = $user_id;

// پاک‌سازی داده‌های موقت
unset($_SESSION['signup'], $_SESSION['auth_phone']);

header('Location: ' . ($_GET['redirect'] ?? 'index.php'));
exit;
?>