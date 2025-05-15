<?php
session_start();
include "conn.php";

if (!isset($_SESSION['auth_phone'])) header('Location: phone.php');

$phone = $_SESSION['auth_phone'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT user_id, user_password FROM users WHERE user_phone = ?");
$stmt->bind_param('s', $phone);
$stmt->execute();
$stmt->bind_result($id, $hash);
$stmt->fetch();

if (password_verify($password, $hash)) {
    // ورود موفق
    $_SESSION['user_id'] = $id;
    unset($_SESSION['auth_phone']);
    header("Location: " . ($_GET['redirect'] ?? 'index.php'));
} else {
    header('Location: password.php?error=1');
}
exit;
?>