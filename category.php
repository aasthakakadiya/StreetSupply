<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['name']); ?> - VendorSupply</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section class="category-header">
        <h1><?php echo htmlspecialchars($category['name']); ?></h1>
        <p>Browse all raw materials in this category</p>
    </section>
    
    <section class="category-materials">
        <div class="material-grid">
            <?php if (count($materials) > 0): ?>
                <?php foreach ($materials as $material): ?>
                <div class="material-card">
                    <div class="material-img" style="background-image: url('uploads/<?php echo $material['image'] ? $material['image'] : 'default_material.jpg'; ?>')"></div>
                    <div class="material-info">
                        <h3 class="material-name"><?php echo htmlspecialchars($material['name']); ?></h3>
                        <p class="material-vendor">By <?php echo htmlspecialchars($material['business_name'] ?: $material['vendor_name']); ?></p>
                        <p class="material-price">₹<?php echo number_format($material['price_per_unit'], 2); ?>/<?php echo htmlspecialchars($material['unit']); ?></p>
                        <div class="material-stock">
                            <span>Available: <?php echo number_format($material['available_quantity'], 2); ?> <?php echo htmlspecialchars($material['unit']); ?></span>
                        </div>
                        <button class="btn-add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-results">
                    <i class="fas fa-box-open"></i>
                    <p>No materials found in this category</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>
</html>