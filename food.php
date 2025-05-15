<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | سفارش <?php echo $_GET['food_title'] ?>  </title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">
    <?php
    include "conn.php";

    $id = (int)$_GET['id'];
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    $food = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM foods WHERE food_id = $id"));
    if (!$food) {
        echo "<div class='alert alert-pink'>غذا یافت نشد.</div>";
        exit;
    }

    $in_cart = $cart[$id] ?? 0;
    ?>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm rounded">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="product_images/<?= htmlspecialchars($food['image_url']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($food['food_title']) ?>" style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= htmlspecialchars($food['food_title']) ?></h2>
                            <p class="card-text"><?= htmlspecialchars($food['food_description'] ?? 'توضیحاتی برای این غذا موجود نیست.') ?></p>
                            <p class="card-text text-muted">قیمت: <?= number_format($food['food_price']) ?> تومان</p>

                            <form method="post" action="update_cart.php" class="d-flex align-items-center gap-3 mt-3">
                                <input type="hidden" name="food_id" value="<?= $food['food_id'] ?>">
                                <div class="input-group w-auto">
                                    <span class="input-group-text">تعداد</span>
                                    <input type="number" name="quantity" value="<?= $in_cart ?: 0 ?>" min="0" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-pink btn-sm">افزودن به سبد خرید</button>
                            </form>

                            <?php if ($in_cart): ?>
                                <p class="text-pink mt-2">(در سبد: <?= $in_cart ?> عدد)</p>
                            <?php endif; ?>

                            <!--<button class="btn btn-outline-secondary mt-3" onclick="history.back()">بازگشت</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php include_once "footer.php"; ?>

</body>
</html>