<?php
// حذف کوکی با زمان منقضی‌شده
setcookie('cart', '', time() - 3600, '/');

// برگشت به صفحه سبد خرید
header('Location: cart.php');
exit;
?>
