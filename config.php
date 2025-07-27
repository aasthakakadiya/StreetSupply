<?php
$host = 'localhost';
$dbname = 'linkdin_clone';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Define base URL
define('BASE_URL', 'http://localhost/street_vendor_supply');
?>