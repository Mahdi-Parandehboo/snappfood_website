<?php session_start(); 

include 'conn.php';

// اگر لاگین نبود، ریدایرکت شود
if (!isset($_SESSION['user_id'])) {
    header("Location: phone.php");
    exit;
}

// دریافت اطلاعات کاربر
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT user_first_name, user_last_name, user_phone, user_email FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $phone, $email);
$stmt->fetch();
$stmt->close();

// بررسی پیام موفقیت‌آمیز
$success = isset($_GET['success']);
?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | پنل کاربری</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm p-4 text-center">
        <h3 class="mb-4"><?= htmlspecialchars($first_name) ?> <?= htmlspecialchars($last_name) ?></h3>

        <?php if ($success): ?>
          <div class="alert alert-pink">اطلاعات با موفقیت به‌روزرسانی شد.</div>
        <?php endif; ?>

        <div class="mb-4">
          <h5 class="text-secondary">اطلاعات حساب</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <strong>شماره تلفن:</strong> <?= htmlspecialchars($phone) ?>
            </li>
            <li class="list-group-item">
              <strong>ایمیل:</strong> <?= htmlspecialchars($email) ?>
            </li>
          </ul>
        </div>

        <h5 class="mb-3">ویرایش نام و نام خانوادگی</h5>
        <form method="post" action="update_name.php">
          <div class="row g-3 justify-content-center">
            <div class="col-md-6">
              <input type="text" name="first_name" class="form-control text-center" value="<?= htmlspecialchars($first_name) ?>" required placeholder="نام">
            </div>
            <div class="col-md-6">
              <input type="text" name="last_name" class="form-control text-center" value="<?= htmlspecialchars($last_name) ?>" required placeholder="نام خانوادگی">
            </div>
          </div>
          <div class="mt-3 d-grid col-6 mx-auto">
            <button type="submit" class="btn btn-pink">ذخیره تغییرات</button>
          </div>
        </form>

        <hr class="my-4">

        <form method="post" action="logout.php" class="text-center">
          <button type="submit" class="btn btn-outline-secondary">خروج از حساب</button>
        </form>

      </div>
    </div>
  </div>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>