<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - VendorSupply</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section class="search-results-header">
        <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
        <p><?php echo count($materials); ?> materials found</p>
        
        <div class="search-filters">
            <form action="search.php" method="GET">
                <input type="hidden" name="q" value="<?php echo htmlspecialchars($query); ?>">
                <div class="filter-group">
                    <label for="category">Filter by Category:</label>
                    <select id="category" name="category">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['category_id']; ?>" <?php echo $selected_category == $category['category_id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn-filter">Apply Filters</button>
            </form>
        </div>
    </section>
    
    <section class="search-results">
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
                    <i class="fas fa-search"></i>
                    <p>No materials found matching your search</p>
                    <a href="index.php" class="btn btn-primary">Browse All Materials</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>
</html>