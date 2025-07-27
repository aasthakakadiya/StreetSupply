<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart - Swatha Basket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Your Cart</h2>
  <?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price (₹)</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $index => $item): ?>
          <?php 
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
          ?>
          <tr>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td>₹ <?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>₹ <?php echo number_format($subtotal, 2); ?></td>
            <td>
              <a href="remove_from_cart.php?index=<?php echo $index; ?>" class="btn btn-sm btn-danger">Remove</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="3" class="text-end"><strong>Total:</strong></td>
          <td colspan="2"><strong>₹ <?php echo number_format($total, 2); ?></strong></td>
        </tr>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
    <a href="#" class="btn btn-success">Checkout (coming soon)</a>
  <?php endif; ?>
</div>
</body>
</html>
