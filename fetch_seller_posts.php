<?php
require 'db.php';
header('Content-Type: application/json');

$sql = "SELECT p.*, u.name AS seller_name, u.location 
        FROM products p 
        JOIN users u ON p.user_id = u.id 
        ORDER BY p.created_at DESC";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
?>
