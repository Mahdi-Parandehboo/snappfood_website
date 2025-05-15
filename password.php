<?php
  session_start();
  if (!isset($_SESSION['auth_phone'])) header('Location: phone.php');
  if (isset($_SESSION['user_id'])) header('Location: ' . ($_GET['redirect'] ?? 'index.php'));
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | ورود - پسورد</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">

  <div class="container py-5">
    <h3 class="mb-4">لطفاً رمز عبور خود را وارد کنید</h3>
    <form method="post" action="verify_password.php">
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="رمز عبور" required>
      </div>
      <button type="submit" class="btn btn-pink">ورود</button>
    </form>
  </div>

</main>

<?php include_once "footer.php"; ?>
</body>
</html>