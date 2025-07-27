<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material - VendorSupply</title>
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
                    <h1>Edit Material</h1>
                    <p>Update your material details</p>
                </div>
                <div class="header-actions">
                    <a href="materials.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Back to Materials
                    </a>
                </div>
            </div>
            
            <div class="form-container">
                <?php if (isset($error)): ?>
                    <div class="alert alert-error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form action="edit_material.php?id=<?php echo $material['material_id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="current-image">
                        <?php if ($material['image']): ?>
                            <img src="../uploads/<?php echo $material['image']; ?>" alt="<?php echo htmlspecialchars($material['name']); ?>">
                            <label>
                                <input type="checkbox" name="remove_image"> Remove current image
                            </label>
                        <?php else: ?>
                            <div class="no-image"><i class="fas fa-box-open"></i> No image</div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Material Name *</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($material['name']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Category *</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['category_id']; ?>" <?php echo $category['category_id'] == $material['category_id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"><?php echo htmlspecialchars($material['description']); ?></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price per Unit *</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" value="<?php echo $material['price_per_unit']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="unit">Unit (kg, liter, etc.) *</label>
                            <input type="text" id="unit" name="unit" value="<?php echo htmlspecialchars($material['unit']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="quantity">Available Quantity *</label>
                            <input type="number" id="quantity" name="quantity" step="0.01" min="0" value="<?php echo $material['available_quantity']; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">New Material Image</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <small>Max file size: 2MB (JPEG, PNG). Leave blank to keep current image.</small>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <a href="materials.php" class="btn btn-outline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/vendor.js"></script>
</body>
</html>