<?php
session_start();
require('db.php');
include('includes/nav.php');

$total = 0;

echo '<div class="container my-4">';
echo '<h2 class="text-center mb-4">Shopping Cart</h2>';

if (!empty($_SESSION['cart'])) {
    echo '<form action="cart.php" method="post">';
    echo '<table class="table table-striped table-hover text-center">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Action</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($_SESSION['cart'] as $id => $item) {
        $q = "SELECT item_name FROM products WHERE item_id = $id";
        $r = mysqli_query($link, $q);
        $row = mysqli_fetch_assoc($r);

        $subtotal = $item['quantity'] * $item['price'];
        $total += $subtotal;

        echo "<tr>
            <td>{$row['item_name']}</td>
            <td>£{$item['price']}</td>
            <td>
                <input type='number' name='qty[$id]' value='{$item['quantity']}' min='1' class='form-control w-50 mx-auto'>
            </td>
            <td>£" . number_format($subtotal, 2) . "</td>
            <td>
                <a href='remove.php?id=$id' class='btn btn-danger btn-sm'>Remove</a>
            </td>
        </tr>";
    }

    echo "<tr class='font-weight-bold'>
        <td colspan='3' class='text-right'>Total</td>
        <td>£" . number_format($total, 2) . "</td>
        <td></td>
    </tr>";

    echo '</tbody>';
    echo '</table>';
    echo '<div class="text-right">';
    echo '<input type="submit" name="update" value="Update Cart" class="btn btn-primary mr-2">';
    echo '<a href="checkout.php" class="btn btn-success">Checkout</a>';
    echo '</div>';
    echo '</form>';
} else {
    echo '<p class="text-center text-muted">Your cart is empty.</p>';
}

echo '</div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['qty'])) {
    foreach ($_POST['qty'] as $id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
    header('Location: cart.php');
}

include('includes/footer.php');
?>
