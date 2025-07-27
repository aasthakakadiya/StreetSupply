// Search functionality
document.querySelector('.search-bar button').addEventListener('click', function() {
    const query = document.querySelector('.search-bar input').value;
    if (query.trim()) {
        window.location.href = `search.php?q=${encodeURIComponent(query)}`;
    }
});

// Add to cart buttons
document.querySelectorAll('.btn-add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const materialId = this.dataset.id;
        // Add to cart logic
        console.log(`Added material ${materialId} to cart`);
    });
});