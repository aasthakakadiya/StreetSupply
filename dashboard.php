<?php 
require '../includes/header.php';
require '../includes/auth_check.php';
?>

<div class="dashboard-container">
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <h1>Dashboard</h1>
            <a href="add_material.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Material
            </a>
        </div>
        
        <div class="stats-cards">
            <div class="stat-card">
                <h3>Active Listings</h3>
                <p><?= $stats['materials'] ?></p>
            </div>
            <div class="stat-card">
                <h3>Monthly Orders</h3>
                <p><?= $stats['orders'] ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <p>₹<?= $stats['revenue'] ?></p>
            </div>
        </div>
        
        <div class="recent-materials">
            <h2>Recent Materials</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recent_materials as $material): ?>
                    <tr>
                        <td><img src="../uploads/<?= $material['image'] ?>" class="material-img-small"></td>
                        <td><?= $material['name'] ?></td>
                        <td>₹<?= $material['price'] ?>/<?= $material['unit'] ?></td>
                        <td><?= $material['quantity'] ?> <?= $material['unit'] ?></td>
                        <td>
                            <a href="edit_material.php?id=<?= $material['id'] ?>" class="btn-edit">Edit</a>
                            <a href="delete_material.php?id=<?= $material['id'] ?>" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>