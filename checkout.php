<?php
session_start();
require('db.php');

if (!empty($_SESSION['cart'])) {
    $total = 0;

    foreach ($_SESSION['cart'] as $id => $item) {
        $total += $item['quantity'] * $item['price'];
    }

    $q = "INSERT INTO orders (user_id, total, order_date) VALUES (1, $total, NOW())";
    mysqli_query($link, $q);
    $order_id = mysqli_insert_id($link);

    foreach ($_SESSION['cart'] as $id => $item) {
        $q = "INSERT INTO order_contents (order_id, item_id, quantity, price) VALUES ($order_id, $id, {$item['quantity']}, {$item['price']})";
        mysqli_query($link, $q);
    }

    $_SESSION['cart'] = [];
    echo '<p>Order placed successfully! Your order number is ' . $order_id . '.</p>';
} else {
    echo '<p>Your cart is empty.</p>';
}

mysqli_close($link);
?>
