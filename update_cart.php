<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_id = (int)$_POST['food_id'];
    $quantity = (int)$_POST['quantity'];

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    if ($quantity <= 0) {
        unset($cart[$food_id]);
    } else {
        $cart[$food_id] = $quantity;
    }

    setcookie('cart', json_encode($cart), time() + 86400, '/');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
