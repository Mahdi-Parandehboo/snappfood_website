<?php
session_start();

if (!isset($_SESSION['auth_phone'])) header('Location: phone.php');

if (!isset($_POST["email"])) {
    header('Location: signup_email.php');
    exit;
}

if (isset($_SESSION['user_id'])) {
    header('Location: ' . ($_GET['redirect'] ?? 'index.php'));
    exit;
}

$email = $_POST['email'];
$phone = $_SESSION['auth_phone'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup_email.php?error=1");
    exit;
}

// ساخت کد تأیید
$token = strval(rand(100000, 999999)); // کد عددی ۶ رقمی برای وارد کردن



// ارسال ایمیل
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {

    $lines = file('D:/xampp/htdocs/SMTP.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $username = $lines[0] ?? '';
    $password = $lines[1] ?? '';
    $name = $lines[2] ?? '';

    $mail->SMTPDebug = SMTP::DEBUG_OFF; // حالت توسعه
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $username ; // ایمیل واقعی شما
    $mail->Password = $password; // رمز اپلیکیشن از Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    
    $mail->setFrom($username , $name);
    $mail->addAddress($email);
    
    $mail->isHTML(false);
    $mail->Subject = "email authentication";
    $mail->Body = "کد تایید شما: $token";
    
    $mail->send();
    
    $_SESSION['signup'] = ['phone'=>$phone, 'email'=>$email, 'token'=>$token];

    header("Location: verify_email.php"); // صفحه وارد کردن کد تأیید
    exit;
} catch (Exception $e) {
    //echo "خطا در ارسال ایمیل: {$mail->ErrorInfo}";
    header("Location: signup_email.php?error=2");
    exit;
}
