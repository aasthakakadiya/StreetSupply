<?php
require '../includes/header.php';
require '../includes/auth_check.php';

// Get sales statistics
$stmt = $pdo->prepare("SELECT 
                      COUNT(*) as total_orders,
                      SUM(total_amount) as total_revenue,
                      AVG(total_amount) as avg_order_value
                      FROM orders
                      WHERE seller_vendor_id = ?");
$stmt->execute([$_SESSION['vendor_id']]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

// Get recent sales
$stmt = $pdo->prepare("SELECT o.*, v.name as buyer_name 
                      FROM orders o
                      JOIN vendors v ON o.buyer_vendor_id = v.vendor_id
                      WHERE o.seller_vendor_id = ?
                      ORDER BY o.created_at DESC
                      LIMIT 5");
$stmt->execute([$_SESSION['vendor_id']]);
$recent_sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="dashboard-container">
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <h1>Sales Dashboard</h1>
        </div>
        
        <div class="sales-stats">
            <div class="stat-card">
                <h3>Total Orders</h3>
                <p><?php echo $stats['total_orders']; ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <p>₹<?php echo number_format($stats['total_revenue'], 2); ?></p>
            </div>
            <div class="stat-card">
                <h3>Avg. Order Value</h3>
                <p>₹<?php echo number_format($stats['avg_order_value'], 2); ?></p>
            </div>
        </div>
        
        <div class="recent-sales">
            <h2>Recent Sales</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_sales as $sale): ?>
                    <tr>
                        <td>#<?php echo $sale['order_id']; ?></td>
                        <td><?php echo htmlspecialchars($sale['buyer_name']); ?></td>
                        <td><?php echo date('d M Y', strtotime($sale['created_at'])); ?></td>
                        <td>₹<?php echo number_format($sale['total_amount'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>