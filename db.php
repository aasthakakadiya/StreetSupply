<?php
$host = 'localhost';
$db   = 'linkedin_clone';
$user = 'root';
$pass = ''; // your mysql password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
