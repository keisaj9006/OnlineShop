<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MkTime</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">MkTime</a>
    <button class="navbar-toggler" type="button" 
            data-toggle="collapse" 
            data-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="create.php">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="read.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="update.php">Update</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="delete.php">Delete</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <span class="navbar-text text-white mr-3">
                        Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white px-3 mx-2" href="cart.php">Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white px-3 mx-2" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-white px-3 mx-2" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-dark px-3 mx-2" href="register.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
