<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | تایید ایمیل</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">

    <div class="container py-5">
    <h3 class="mb-4">کد تأیید ایمیل</h3>
    <form method="post" action="complete_signup.php">
        <div class="mb-3">
        <input type="text" name="token" class="form-control" placeholder="کد تأیید" required>
        </div>
        <button type="submit" class="btn btn-pink">تأیید و ادامه</button>
    </form>
    </div>

</main>

<?php include_once "footer.php"; ?>
</body>
</html>