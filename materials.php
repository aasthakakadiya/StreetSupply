<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Materials - VendorSupply</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="dashboard-header">
                <div class="page-title">
                    <h1>My Materials</h1>
                    <p>Manage your listed raw materials</p>
                </div>
                <div class="header-actions">
                    <a href="add_material.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>
            
            <div class="materials-table">
                <div class="table-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Search materials...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="filter-options">
                        <select>
                            <option>All Categories</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['category_id']; ?>">
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <select>
                            <option>All Status</option>
                            <option>Verified</option>
                            <option>Pending</option>
                        </select>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materials as $material): ?>
                        <tr>
                            <td>
                                <?php if ($material['image']): ?>
                                    <img src="../uploads/<?php echo $material['image']; ?>" class="material-img-small" alt="<?php echo htmlspecialchars($material['name']); ?>">
                                <?php else: ?>
                                    <div class="material-img-small no-image"><i class="fas fa-box-open"></i></div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($material['name']); ?></td>
                            <td><?php echo htmlspecialchars($material['category_name']); ?></td>
                            <td>₹<?php echo number_format($material['price_per_unit'], 2); ?>/<?php echo htmlspecialchars($material['unit']); ?></td>
                            <td><?php echo number_format($material['available_quantity'], 2); ?> <?php echo htmlspecialchars($material['unit']); ?></td>
                            <td>
                                <span class="status-badge <?php echo $material['is_verified'] ? 'status-active' : 'status-pending'; ?>">
                                    <?php echo $material['is_verified'] ? 'Verified' : 'Pending'; ?>
                                </span>
                            </td>
                            <td>
                                <a href="edit_material.php?id=<?php echo $material['material_id']; ?>" class="action-btn edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_material.php?id=<?php echo $material['material_id']; ?>" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this material?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <a href="#" class="disabled">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/vendor.js"></script>
</body>
</html>