<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['signup'])) header('Location: phone.php');
$data = $_SESSION['signup'];
if (!isset($_POST['token'], $data['token']) || 
    strval($_POST['token']) !== strval($data['token'])) {
    echo 'کد نامعتبر است.';
    exit;
}


// ثبت نهایی کاربر
$phone = $data['phone'];
$email = $data['email'];
// فرم درخواست نام و نام خانوادگی و پسورد:
?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | تکمیل ثبت‌نام</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">

    <div class="container py-5">
    <h3 class="mb-4">تکمیل اطلاعات</h3>
    <form method="post" action="store_user.php">
        <div class="mb-3">
        <input type="text" name="first_name" class="form-control" placeholder="نام" required>
        </div>
        <div class="mb-3">
        <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی" required>
        </div>
        <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="رمز عبور" required>
        </div>
        <button type="submit" class="btn btn-pink">ثبت نهایی</button>
    </form>
    </div>

</main>

<?php include_once "footer.php"; ?>
</body>
</html>