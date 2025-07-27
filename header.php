<?php
session_start();
require 'config.php';
require 'auth_functions.php';

// Check if user is logged in
$current_vendor = null;
if (isset($_SESSION['vendor_id'])) {
    $current_vendor = getVendorById($_SESSION['vendor_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>VendorSupply</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <i class="fas fa-utensils"></i>
            <span>VendorSupply</span>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/category.php">Categories</a></li>
                <li><a href="<?php echo BASE_URL; ?>/search.php">Suppliers</a></li>
                <li><a href="<?php echo BASE_URL; ?>/about.php">About</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php if ($current_vendor): ?>
                <a href="<?php echo BASE_URL; ?>/vendor/dashboard.php" class="btn btn-primary">
                    <i class="fas fa-user"></i> My Account
                </a>
                <a href="<?php echo BASE_URL; ?>/logout.php" class="btn btn-outline">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            <?php else: ?>
                <a href="<?php echo BASE_URL; ?>/login.php" class="btn btn-outline">Login</a>
                <a href="<?php echo BASE_URL; ?>/register.php" class="btn btn-primary">Register</a>
            <?php endif; ?>
        </div>
    </header>
    
    <main>