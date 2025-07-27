<?php require 'includes/header.php'; ?>

<section class="hero">
    <h1>Quality Raw Materials for Street Food Vendors</h1>
    <p>Connect directly with trusted suppliers and get the best prices</p>
    <form action="search.php" method="GET" class="search-bar">
        <input type="text" name="q" placeholder="Search vegetables, spices, oils...">
        <button type="submit"><i class="fas fa-search"></i> Search</button>
    </form>
</section>

<section class="categories">
    <h2>Categories</h2>
    <div class="category-grid">
        <?php foreach($categories as $category): ?>
        <a href="category.php?id=<?= $category['id'] ?>" class="category-card">
            <div class="category-img">
                <i class="<?= $category['icon'] ?>"></i>
            </div>
            <div class="category-name"><?= $category['name'] ?></div>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="featured-materials">
    <h2>Featured Materials</h2>
    <div class="material-grid">
        <?php foreach($featured_materials as $material): ?>
        <div class="material-card">
            <div class="material-img" style="background-image: url('uploads/<?= $material['image'] ?>')"></div>
            <div class="material-info">
                <h3><?= $material['name'] ?></h3>
                <p>By <?= $material['vendor'] ?></p>
                <p>₹<?= $material['price'] ?>/<?= $material['unit'] ?></p>
                <button class="btn-add-to-cart">Add to Cart</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require 'includes/footer.php'; ?>