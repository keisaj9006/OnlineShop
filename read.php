<?php
include('includes/nav.php');
require('db.php'); // Open database connection.

// Retrieve items from 'products' database table.
$q = "SELECT * FROM products";
$r = mysqli_query($link, $q);

if ($r && mysqli_num_rows($r) > 0) {
    echo '<div class="container my-4">';
    echo '<div class="row">';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $imgPath = "uploads/" . htmlspecialchars($row['item_img']);
        $imgExists = file_exists($imgPath);
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card product-card shadow-sm">
                <!-- Obraz produktu -->
                <img src="<?php echo $imgExists ? 'uploads/' . htmlspecialchars($row['item_img']) : 'placeholder.jpg'; ?>" 
                class="card-img-top product-img" 
                alt="<?php echo htmlspecialchars($row['item_name']); ?>">

                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                    <p class="card-text text-muted"><?php echo htmlspecialchars($row['item_desc']); ?></p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center font-weight-bold">
                        £<?php echo htmlspecialchars($row['item_price']); ?>
                    </li>
                    <li class="list-group-item">
                        <a href="update.php?id=<?php echo htmlspecialchars($row['item_id']); ?>" 
                           class="btn btn-sm btn-primary btn-block">Update</a>
                    </li>
                    <li class="list-group-item">
                        <a href="delete.php?item_id=<?php echo htmlspecialchars($row['item_id']); ?>" 
                           class="btn btn-sm btn-danger btn-block">Delete Item</a>
                    </li>
                    <li class="list-group-item">
                        <a href="added.php?id=<?php echo htmlspecialchars($row['item_id']); ?>" 
                           class="btn btn-sm btn-success btn-block">Add to Cart</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }

    echo '</div>'; 
    echo '</div>'; 
} else { // display message.
    echo '<div class="container my-4">';
    echo '<p class="text-center text-muted">There are currently no items in the table to display.</p>';
    echo '</div>';
}

mysqli_close($link);
include('includes/footer.php');
?>
