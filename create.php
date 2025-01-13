<?php
include 'includes/nav.php';
?>
<div class="container mt-5">
    <div class="form-container">
        <h2>Add Product</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" id="item_name" class="form-control" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="item_desc" class="form-control" name="item_desc" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="item_img" class="form-control" name="item_img" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="item_price" class="form-control" name="item_price" min="0" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>

<?php
include 'includes/footer.php'; // Import footer

# Obsługa formularza
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Połączenie z bazą danych
    require 'db.php';

    # Inicjalizacja tablicy błędów
    $errors = array();

    # Walidacja i sanitizacja danych
    if (empty($_POST['item_name'])) {
        $errors[] = 'Enter the item name.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    if (empty($_POST['item_desc'])) {
        $errors[] = 'Enter the item description.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    # Obsługa przesłanego obrazu
    if (!empty($_FILES['item_img']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["item_img"]["name"]);
    
        // Sprawdzenie, czy przesyłanie pliku się powiodło
        if (move_uploaded_file($_FILES["item_img"]["tmp_name"], $target_file)) {
            $img = basename($_FILES["item_img"]["name"]); // Zapisujemy tylko nazwę pliku do bazy danych
        } else {
            $errors[] = 'Failed to upload the image.';
        }
    } else {
        $errors[] = 'Please select an image.';
    }
    
    if (empty($_POST['item_price'])) {
        $errors[] = 'Enter the item price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }

    # Jeśli nie ma błędów, wstaw dane do bazy
    if (empty($errors)) {
        $q = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
              VALUES ('$n', '$d', '$img', '$p')";
        $r = mysqli_query($link, $q);

        if ($r) {
            echo '<p class="text-success text-center">New product added successfully</p>';
        } else {
            echo '<p class="text-danger text-center">Error: ' . mysqli_error($link) . '</p>';
        }

        # Zamknięcie połączenia z bazą
        mysqli_close($link);
        exit();
    } else {
        # Wyświetlenie błędów
        echo '<div class="text-danger text-center">';
        foreach ($errors as $msg) {
            echo "<p>$msg</p>";
        }
        echo '<p>Please try again.</p></div>';
    }

    # Zamknięcie połączenia z bazą
    mysqli_close($link);
}
?>
