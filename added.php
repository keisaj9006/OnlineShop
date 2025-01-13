<?php
session_start(); //session star
require('db.php'); // database connecition

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // upload product details from database 
    $q = "SELECT * FROM products WHERE item_id = $id";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_assoc($r);

        //add product to the cart or change quantity
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'quantity' => 1,
                'price' => $row['item_price']
            ];
        }

        echo '<div class="alert alert-success">Product added to cart! <a href="cart.php">View Cart</a></div>';
    } else {
        echo '<div class="alert alert-danger">Product not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No product ID provided.</div>';
} // conditons if- show this

mysqli_close($link);
?>
