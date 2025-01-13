<?php
// start session
session_start();

// disposal all session variables
$_SESSION = array();

// disposal session itself
session_destroy();

// redirect to login.php cart
header("Location: login.php");
exit();
?>
