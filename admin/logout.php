<?php
include("includes/conn.php");


// Unset the specific session variable for admin login
unset($_SESSION['admin_login']);

// If the admin cookie was set, unset it
if (isset($_COOKIE['admin_loggedin'])) {
    setcookie('admin_loggedin', '', time() - 3600, '/');
}

// Redirect to login page
header('Location: login');
exit();
