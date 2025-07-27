<?php
session_start();

$product = [
  'id' => $_POST['id'],
  'name' => $_POST['name'],
  'price' => $_POST['price'],
  'quantity' => 1
];

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

$found = false;

foreach ($_SESSION['cart'] as &$item) {
  if ($item['id'] == $product['id']) {
    $item['quantity'] += 1;
    $found = true;
    break;
  }
}

if (!$found) {
  $_SESSION['cart'][] = $product;
}

header('Location: cart.php');
exit();
