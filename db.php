<?php
// Database configuration
$host = 'localhost'; // Server address
$dbname = 'mktime'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Establish a database connection
$link = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$link) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Set character encoding to UTF-8 for proper handling of special characters
mysqli_set_charset($link, 'utf8');
?>
