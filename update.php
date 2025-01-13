<?php
// Include navigation 
include('includes/nav.php');
require('db.php'); //Connect to the database.

// check if the user chose product to edition
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Pobranie danych produktu do edycji
    $q = "SELECT * FROM products WHERE item_id = $id";
    $r = mysqli_query($link, $q);

    if ($r && mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_assoc($r); // Pobranie danych produktu
    } else {
        echo '<div class="container my-4"><p class="text-danger text-center">Invalid product ID!</p></div>';
        include('includes/footer.php');
        exit();
    }

    // Obsługa formularza po wysłaniu danych
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($link, trim($_POST['item_name']));
        $desc = mysqli_real_escape_string($link, trim($_POST['item_desc']));
        $price = floatval($_POST['item_price']);
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));

        // Aktualizacja danych w bazie
        $updateQuery = "UPDATE products SET item_name = '$name', item_desc = '$desc', item_price = $price, item_img = '$img' WHERE item_id = $id";
        $updateResult = mysqli_query($link, $updateQuery);

        if ($updateResult) {
            echo '<div class="container my-4"><p class="text-success text-center">Product updated successfully!</p></div>';
        } else {
            echo '<div class="container my-4"><p class="text-danger text-center">Failed to update product: ' . mysqli_error($link) . '</p></div>';
        }
    }

    // Wyświetlenie formularza edycji
    ?>
    <div class="container my-4">
        <h2 class="text-center">Update Product</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="item_name">Product Name:</label>
                <input type="text" name="item_name" class="form-control" value="<?php echo htmlspecialchars($row['item_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="item_desc">Description:</label>
                <textarea name="item_desc" class="form-control" required><?php echo htmlspecialchars($row['item_desc']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="item_img">Image URL:</label>
                <input type="text" name="item_img" class="form-control" value="<?php echo htmlspecialchars($row['item_img']); ?>" required>
            </div>
            <div class="form-group">
                <label for="item_price">Price:</label>
                <input type="number" name="item_price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($row['item_price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <?php
} else {
    // Wyświetlenie listy produktów do wyboru
    echo '<div class="container my-4">';
    echo '<h2 class="text-center">Select Product to Update</h2>';
    echo '<div class="row">';

    $q = "SELECT * FROM products";
    $r = mysqli_query($link, $q);

    if ($r && mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_assoc($r)) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="uploads/<?php echo htmlspecialchars($row['item_img']); ?>" class="card-img-top product-img" alt="Product Image">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                        <p class="card-text">£<?php echo htmlspecialchars($row['item_price']); ?></p>
                        <a href="update.php?id=<?php echo htmlspecialchars($row['item_id']); ?>" class="btn btn-primary btn-sm btn-block">Update</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p class="text-danger text-center">No products available to update.</p>';
    }

    echo '</div>';
    echo '</div>';
}

include('includes/footer.php');
?>
