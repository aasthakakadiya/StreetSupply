<?php
require 'db.php';

$user_id = $_POST['user_id']; // from form
$name = $_POST['name'];
$price = $_POST['price'];
$image_url = ""; // Optional

// Upload image
if (!empty($_FILES['image']['name'])) {
  $filename = time() . "_" . basename($_FILES['image']['name']);
  $target_path = "../images/" . $filename;
  move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
  $image_url = $filename;
}

$sql = "INSERT INTO products (user_id, name, price, image_url) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isds", $user_id, $name, $price, $image_url);
$stmt->execute();

header("Location: ../home.html");
exit();
?>
