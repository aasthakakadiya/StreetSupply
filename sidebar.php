<?php if (!isset($current_vendor)) return; ?>

<div class="sidebar">
    <div class="sidebar-header">
        <div class="vendor-profile">
            <div class="vendor-avatar">
                <?php if ($current_vendor['profile_image']): ?>
                    <img src="<?php echo BASE_URL; ?>/uploads/<?php echo $current_vendor['profile_image']; ?>" alt="Vendor">
                <?php else: ?>
                    <i class="fas fa-user"></i>
                <?php endif; ?>
            </div>
            <div class="vendor-info">
                <h3><?php echo htmlspecialchars($current_vendor['name']); ?></h3>
                <p><?php echo htmlspecialchars($current_vendor['business_name']); ?></p>
            </div>
        </div>
    </div>
    
    <ul class="sidebar-menu">
        <li>
            <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="materials.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'materials.php' ? 'active' : ''; ?>">
                <i class="fas fa-carrot"></i> My Materials
            </a>
        </li>
        <li>
            <a href="add_material.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'add_material.php' ? 'active' : ''; ?>">
                <i class="fas fa-plus-circle"></i> Add Material
            </a>
        </li>
        <li>
            <a href="orders.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : ''; ?>">
                <i class="fas fa-shopping-cart"></i> Orders
            </a>
        </li>
        <li>
            <a href="sales.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'sales.php' ? 'active' : ''; ?>">
                <i class="fas fa-rupee-sign"></i> Sales
            </a>
        </li>
        <li>
            <a href="profile.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                <i class="fas fa-user"></i> Profile
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>