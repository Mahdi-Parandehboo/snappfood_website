<?php
session_start();
if (!isset($_SESSION['auth_phone'])) header('Location: phone.php');
include 'head.php';
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | ثبت‌نام - ایمیل</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">

    <div class="container py-5">
    <h3 class="mb-4">حساب جدید! لطفاً ایمیل خود را وارد کنید</h3>
    <form method="post" action="send_verification.php">
        <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
        </div>
        <button type="submit" class="btn btn-pink">ارسال کد تأیید</button>
    </form>
    </div>

</main>

<?php include_once "footer.php"; ?>
</body>
</html>