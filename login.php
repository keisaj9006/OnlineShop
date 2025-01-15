<?php
include('includes/nav.php');

// session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('db.php'); // Połączenie z bazą danych

    $errors = [];

    // email validation
    if (empty($_POST['email'])) {
        $errors[] = 'Enter your email address.';
    } else {
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    // password validation
    if (empty($_POST['pass'])) {
        $errors[] = 'Enter your password.';
    } else {
        $password = trim($_POST['pass']);
    }

    // log in
    if (empty($errors)) {
        $query = "SELECT user_id, first_name, last_name, pass FROM users WHERE email = '$email'";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            echo "Email (entered): $email<br>";
            echo "Password (entered): $password<br>";
            echo "Password (hash from DB): {$row['pass']}<br>";
         
            if (password_verify($password, $row['pass'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];

                header('Location: index.php');
                exit();
            } else {
                $errors[] = 'Invalid email or password. Please try again.';
            }
        } else {
            $errors[] = 'No account found with the provided email address.';
        }
    }

    mysqli_close($link);
}

// show me errors
if (isset($errors) && !empty($errors)) {
    echo '<div class="container my-4"><p class="text-danger">Oops! There was a problem:<br>';
    foreach ($errors as $msg) {
        echo "<span class='text-danger'>- $msg</span><br>";
    }
    echo '</p></div>';
}
?>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
