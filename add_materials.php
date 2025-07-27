<?php 
require '../includes/header.php';
require '../includes/auth_check.php';
?>

<div class="dashboard-container">
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <h1>Add New Material</h1>
            <a href="materials.php" class="btn btn-outline">Back</a>
        </div>
        
        <form action="process_material.php" method="POST" enctype="multipart/form-data" class="material-form">
            <div class="form-group">
                <label>Material Name</label>
                <input type="text" name="name" required>
            </div>
            
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" required>
                    <?php foreach($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="unit" required>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" step="0.01" required>
                </div>
            </div>
            
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>
            
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
            </div>
            
            <button type="submit" class="btn btn-primary">Save Material</button>
        </form>
    </div>
</div>

<?php require '../includes/footer.php'; ?>