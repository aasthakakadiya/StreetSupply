document.addEventListener("DOMContentLoaded", () => {
  const feed = document.getElementById("vendor-feed");

  fetch("backend/fetch_seller_posts.php")
    .then(res => res.json())
    .then(posts => {
      posts.forEach(post => {
        const card = document.createElement("div");
        card.className = "card mb-3";
        card.innerHTML = `
          <div class="card-body">
            <h5>${post.name} - ₹${post.price}</h5>
            <p>Seller: ${post.seller_name} (${post.location})</p>
            ${post.image_url ? `<img src="images/${post.image_url}" width="200">` : ""}
          </div>
        `;
        feed.appendChild(card);
      });
    });
});
