<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | دسته بندی ها</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">
    <h2 class="text-center text-pink mb-4">دسته‌بندی‌های غذاها</h2>

    <!-- بخش نمایش تمامی غذاها -->
    <div class="text-center mb-5">
        <a href="foods.php" class="btn btn-pink btn-lg">نمایش تمامی غذاها</a>
    </div>

    <!-- بخش دسته بندی ها -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        // connecting database
        include "conn.php";

        $categories = mysqli_query($conn, "SELECT * FROM food_categories");
        while ($cat = mysqli_fetch_assoc($categories)):
        ?>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="category_images/<?= htmlspecialchars($cat['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($cat['name']) ?>" style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($cat['name']) ?></h5>
                        <a href="foods.php?category_id=<?= $cat['id'] ?>&category_name=<?= urlencode($cat['name']) ?>" class="btn btn-outline-pink w-100">
                            مشاهده
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- بخش غذاهای محبوب -->
    <h3 class="text-center text-pink my-4">جدیدترین غذا ها</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        // نمایش غذاهای محبوب (فرض می‌کنیم که ویژگی محبوب بودن در جدول غذاها موجود است)
        $popular_foods = mysqli_query($conn, "SELECT * FROM foods ORDER BY created_at DESC LIMIT 6");
        while ($food = mysqli_fetch_assoc($popular_foods)):
        ?>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="product_images/<?= htmlspecialchars($food['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($food['food_title']) ?>" style="object-fit: cover; height: 200px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($food['food_title']) ?></h5>
                        <p class="card-text text-muted"><?= number_format($food['food_price']) ?> تومان</p>
                        <a href="food.php?id=<?= $food['food_id'] ?>&food_title=<?= urlencode($food['food_title']) ?>" class="btn btn-outline-pink w-100">
                            مشاهده جزئیات
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<!-- footer -->
<?php include_once "footer.php"; ?>

</body>
</html>