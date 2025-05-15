<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | سفارش آنلاین <?php echo $_GET['category_name'] ?> </title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">
    <h2 class="mb-4 text-center text-pink">غذاهای <?php echo $_GET['category_name'] ?? "منتخب" ?></h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php
        include "conn.php";

        $category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        $query = $category_id > 0
            ? "SELECT * FROM foods WHERE category_id = $category_id"
            : "SELECT * FROM foods";
        $foods = mysqli_query($conn, $query);

        while ($food = mysqli_fetch_assoc($foods)):
            $food_id = $food['food_id'];
            $in_cart = $cart[$food_id] ?? 0;
        ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <a href="food.php?id=<?= $food_id ?>&food_title=<?= urlencode($food["food_title"]) ?>" class="text-decoration-none text-dark">
                        <img src="product_images/<?= htmlspecialchars($food['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($food['food_title']) ?>" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($food['food_title']) ?></h5>
                            <p class="card-text text-muted">قیمت: <?= number_format($food['food_price']) ?> تومان</p>
                        </div>
                    </a>
                    <div class="card-footer bg-white">
                        <form method="post" action="update_cart.php" class="d-flex align-items-center justify-content-between gap-2">
                            <input type="hidden" name="food_id" value="<?= $food_id ?>">
                            <input type="number" name="quantity" value="<?= $in_cart ?>" min="0" class="form-control form-control-sm text-center" style="width: 80px;" required>
                            <button type="submit" class="btn btn-sm btn-outline-pink">افزودن</button>
                        </form>
                        <?php if ($in_cart): ?>
                            <small class="text-pink d-block mt-2">در سبد: <?= $in_cart ?> عدد</small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>