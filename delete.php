<?php
// Włączenie nawigacji
include('includes/nav.php');
require('db.php');

// Sprawdzenie, czy `item_id` został przekazany w URL
if (isset($_GET['item_id']) && is_numeric($_GET['item_id'])) {
    $id = intval($_GET['item_id']); // Bezpieczna konwersja na liczbę

    // Najpierw usuń plik obrazu powiązany z rekordem
    $q = "SELECT item_img FROM products WHERE item_id = $id";
    $r = mysqli_query($link, $q);

    if ($r && mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_assoc($r);
        $image_path = "uploads/" . $row['item_img'];

        // Usuń obraz tylko jeśli istnieje w folderze uploads
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Zapytanie SQL do usunięcia rekordu
    $sql = "DELETE FROM products WHERE item_id = $id";

    // Wykonanie zapytania
    if (mysqli_query($link, $sql)) {
        echo "<div class='container my-4'><p class='text-success text-center'>Product deleted successfully!</p></div>";
        header("Refresh: 2; url=delete.php"); // Odświeżenie strony po 2 sekundach
        exit();
    } else {
        echo "<div class='container my-4'><p class='text-danger text-center'>Error deleting record: " . mysqli_error($link) . "</p></div>";
    }
} else {
    // Wyświetlenie listy produktów, jeśli brak `item_id`
    echo '<div class="container my-4">';
    echo '<h2 class="text-center">Select Product to Delete</h2>';
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
                        <a href="delete.php?item_id=<?php echo htmlspecialchars($row['item_id']); ?>" class="btn btn-danger btn-sm btn-block">Delete</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p class="text-danger text-center">No products available to delete.</p>';
    }

    echo '</div>';
    echo '</div>';
}

// Zamknięcie połączenia z bazą danych
mysqli_close($link);
include('includes/footer.php');
?>
