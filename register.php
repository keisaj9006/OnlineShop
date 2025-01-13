<?php
include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('db.php'); // Połączenie z bazą danych

    $errors = [];

    // Walidacja imienia
    if (empty($_POST['first_name'])) {
        $errors[] = 'Enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
    }

    // Walidacja nazwiska
    if (empty($_POST['last_name'])) {
        $errors[] = 'Enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
    }

    // Walidacja emaila
    if (empty($_POST['email'])) {
        $errors[] = 'Please, enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    // Walidacja hasła
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Passwords do not match.';
        } else {
            $p = password_hash(trim($_POST['pass1']), PASSWORD_DEFAULT);
        }
    } else {
        $errors[] = 'Enter your password.';
    }

    // Sprawdzenie, czy email jest już zarejestrowany
    if (empty($errors)) {
        $q = "SELECT user_id FROM users WHERE email='$e'";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) {
            $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>';
        }
    }

    // Rejestracja użytkownika
    if (empty($errors)) {
        $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
              VALUES ('$fn', '$ln', '$e', '$p', NOW())";
        $r = mysqli_query($link, $q);
        if ($r) {
            echo '<div class="container my-4"><p class="text-success text-center">You are now registered.</p><a class="btn btn-primary btn-block" href="login.php">Login</a></div>';
            mysqli_close($link);
            exit();
        } else {
            echo '<p class="text-danger text-center">System error: Could not register user.</p>';
        }
    } else {
        echo '<div class="container my-4"><h4 class="text-danger">The following error(s) occurred:</h4>';
        foreach ($errors as $msg) {
            echo "<p class='text-danger'>$msg</p>";
        }
        echo '</div>';
        mysqli_close($link);
    }
}
?>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Register</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="password" name="pass1" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="pass2">Confirm Password</label>
                    <input type="password" name="pass2" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
