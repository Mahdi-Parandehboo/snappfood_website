<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | سبد خرید</title>
  </head>

<body class="user-select-none bg-light">

    <!-- loding header -->
    <?php
        include_once "header.php";
    ?>

    <main>
        <?php
        include "conn.php";
        
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $total = 0;
        $has_pending_orders = false;
        $orders = [];

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // دریافت سفارش‌های در انتظار این کاربر
            $stmt = $conn->prepare("SELECT o.order_id, o.order_address, o.created_at, i.food_id, i.quantity, i.price, f.food_title
                        FROM orders o
                        JOIN order_items i ON o.order_id = i.order_id
                        JOIN foods f ON i.food_id = f.food_id
                        WHERE o.user_id = ? AND o.order_status = 'pending'
                        ORDER BY o.created_at DESC");

            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // گروه‌بندی آیتم‌ها بر اساس شناسه سفارش
            while ($row = $result->fetch_assoc()) {
                $has_pending_orders = true;
                $orders[$row['order_id']]['address'] = $row['order_address'];
                $orders[$row['order_id']]['created_at'] = $row['created_at'];
                $orders[$row['order_id']]['items'][] = $row;

            }

            $stmt->close();
        }
        ?>

        <div class="container mt-5">

            <?php if ($has_pending_orders): ?>
                <h2 class="mb-4">سفارش‌های در انتظار شما</h2>

                <?php foreach ($orders as $order_id => $order): ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-pink text-white d-flex justify-content-between">
                            <span>تاریخ ثبت: <?= date("Y/m/d H:i", strtotime($order['created_at'])) ?></span>
                        </div>
                        <div class="card-body">
                            <p><strong>آدرس:</strong> <?= htmlspecialchars($order['address']) ?></p>
                            <table class="table table-bordered text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>نام غذا</th>
                                        <th>تعداد</th>
                                        <th>قیمت واحد</th>
                                        <th>مجموع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $order_total = 0;
                                    foreach ($order['items'] as $item):
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $order_total += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['food_title']) ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= number_format($item['price']) ?></td>
                                        <td><?= number_format($subtotal) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">مبلغ کل</th>
                                        <th><?= number_format($order_total) ?> تومان</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            <h2 class="mb-4">سبد خرید شما</h2>

            <?php if (empty($cart)): ?>
                <div class="alert alert-secondary">سبد خرید شما خالی است.</div>
                <a href="categories.php" class="btn btn-pink mt-4">مشاهده دسته‌بندی غذاها</a>
            <?php else: ?>
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>تصویر</th>
                            <th>نام غذا</th>
                            <th>قیمت (تومان)</th>
                            <th>تعداد</th>
                            <th>مجموع</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cart as $food_id => $quantity):
                            $food_id = (int)$food_id;
                            $result = mysqli_query($conn, "SELECT * FROM foods WHERE food_id = $food_id LIMIT 1");
                            if ($food = mysqli_fetch_assoc($result)):
                                $name = htmlspecialchars($food['food_title']);
                                $price = (int)$food['food_price'];
                                $image = htmlspecialchars($food['image_url']);
                                $sum = $price * $quantity;
                                $total += $sum;
                        ?>
                        <tr>
                            <td><img src="product_images/<?= $image ?>" width="80"></td>
                            <td><?= $name ?></td>
                            <td><?= number_format($price) ?></td>
                            <td>
                                <form method="post" action="update_cart.php" class="d-flex justify-content-center" style="gap: 5px;">
                                    <input type="hidden" name="food_id" value="<?= $food_id ?>">
                                    <input type="number" name="quantity" value="<?= $quantity ?>" min="0" class="form-control form-control-sm text-center" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm btn-pink">بروزرسانی</button>
                                </form>
                            </td>
                            <td><?= number_format($sum) ?></td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>

                <div class="text-end mt-4">
                    <h5>مبلغ کل: <strong><?= number_format($total) ?> تومان</strong></h5>
                    <a href="checkout.php" class="btn btn-pink mt-3">تأیید و ثبت سفارش</a>
                    <a href="clear_cart.php" class="btn btn-outline-pink mt-3" onclick="return confirm('آیا مطمئن هستید که می‌خواهید سبد خرید را پاک کنید؟')">حذف کامل سبد خرید</a>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <?php include_once "footer.php"; ?>
    
</body>
</html>
