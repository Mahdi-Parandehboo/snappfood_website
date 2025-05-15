<?php
  session_start();
  // Redirect if already logged in
  if (isset($_SESSION['user_id'])) {
      header("Location: " . ($_GET['redirect'] ?? 'index.php'));
      exit;
  }
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | ورود / ثبت‌نام - شماره تلفن </title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<div class="container py-5">
  <h3 class="mb-4">لطفاً شماره تلفن خود را وارد کنید</h3>
  <form method="post" action="password_or_signup.php">
    <div class="mb-3">
      <input type="tel" name="phone" class="form-control" placeholder="09123456789" required pattern="0[0-9]{10}">
    </div>
    <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">
    <button type="submit" class="btn btn-pink">ادامه</button>
  </form>
</div>

<?php include_once "footer.php"; ?>
</body>
</html>