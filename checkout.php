<?php
session_start();

include 'conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: phone.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$cart = isset($_COOKIE['cart']) 
    ? json_decode($_COOKIE['cart'], true) 
    : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = trim($_POST['address'] ?? '');
    $payment_method = $_POST['payment_method'] ?? '';

    if (empty($cart)) {
        $error = "سبد خرید شما خالی است.";
    } elseif (empty($address)) {
        $error = "لطفاً آدرس را وارد کنید.";
    } elseif (!in_array($payment_method, ['cash', 'online'])) {
        $error = "لطفاً روش پرداخت را انتخاب کنید.";
    } else {
        // بررسی وجود محصولات در دیتابیس + گرفتن قیمت
        $valid = true;
        $placeholders = implode(',', array_fill(0, count($cart), '?'));
        $cart_ids = array_keys($cart);

        $stmt = $conn->prepare("SELECT food_id, food_price FROM foods WHERE food_id IN ($placeholders)");
        $stmt->bind_param(str_repeat('i', count($cart_ids)), ...$cart_ids);
        $stmt->execute();
        $result = $stmt->get_result();

        $valid_items = [];
        while ($row = $result->fetch_assoc()) {
            $valid_items[$row['food_id']] = $row['food_price'];
        }
        $stmt->close();

        foreach ($cart_ids as $id) {
            if (!isset($valid_items[$id])) {
                $valid = false;
                break;
            }
        }

        if (!$valid) {
            $error = "یکی از محصولات سبد خرید شما دیگر موجود نیست.";
        } elseif ($payment_method === 'cash') {
            $status = 'pending';

            $stmt = $conn->prepare("INSERT INTO orders (user_id, order_address, payment_method, order_status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('isss', $user_id, $address, $payment_method, $status);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $order_id = $stmt->insert_id;
                $stmt->close();

                // ثبت آیتم‌های سفارش با قیمت
                $stmt = $conn->prepare("INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)");
                foreach ($cart as $food_id => $quantity) {
                    $price = $valid_items[$food_id]; // قیمت از دیتابیس
                    $stmt->bind_param('iiid', $order_id, $food_id, $quantity, $price);
                    $stmt->execute();
                }
                $stmt->close();

                include "clear_cart.php";
                $success = "سفارش شما با موفقیت ثبت شد. لطفاً منتظر تماس باشید.";
            } else {
                $error = "خطا در ثبت سفارش، لطفاً مجدداً تلاش کنید.";
            }
        } else {
            $error = "سرویس پرداخت آنلاین در حال حاضر در دسترس نمی‌باشد.";
        }
    }
}

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>اسنپ فود | تسویه سفارش</title>
  </head>

  <body class="user-select-none bg-light">

<!-- header -->
<?php include_once "header.php"; ?>

<main class="container py-5">

    <div class="container py-5">

    <h3 class="mb-4">تسویه سفارش</h3>

    <?php if (!empty($error)): ?>
        <div class="alert alert-pink"><?= htmlspecialchars($error) ?></div>
    <?php elseif (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if (empty($success)): ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="address" class="form-label">آدرس تحویل</label>
            <textarea id="address" name="address" class="form-control" rows="3" required><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">نحوه پرداخت</label>
            <select name="payment_method" class="form-select" required>
                <option value="">انتخاب کنید</option>
                <option value="cash" <?= (isset($_POST['payment_method']) && $_POST['payment_method'] === 'cash') ? 'selected' : '' ?>>پرداخت حضوری</option>
                <option value="online" <?= (isset($_POST['payment_method']) && $_POST['payment_method'] === 'online') ? 'selected' : '' ?>>پرداخت آنلاین</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" name="submit" class="btn btn-pink">ادامه</button>
            <button type="submit" name="cancel" class="btn btn-secondary">انصراف</button>
        </div>
    </form>
    <?php endif; ?>

    </div>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>