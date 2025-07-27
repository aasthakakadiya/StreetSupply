// Place inside streetfood-portal/script.js
document.addEventListener("DOMContentLoaded", () => {
  fetchSellerInfo();
  fetchVendorFeed();
  fetchSellerPosts();

  document.getElementById("update-profile-form").addEventListener("submit", async (e) => {
    e.preventDefault();
    const name = document.getElementById("update-name").value;
    const food = document.getElementById("update-food").value;
    const location = document.getElementById("update-location").value;
    const needs = document.getElementById("update-needs").value;

    const res = await fetch("backend/update_seller.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ name, food, location, needs })
    });

    alert(await res.text());
    fetchSellerInfo();
  });
});

async function fetchSellerInfo() {
  const res = await fetch("backend/get_seller.php");
  const data = await res.json();

  document.getElementById("seller-name").textContent = data.name;
  document.getElementById("food-type").textContent = data.food;
  document.getElementById("location").textContent = data.location;

  const needsList = document.getElementById("daily-needs-list");
  needsList.innerHTML = data.needs.split(',').map(item => `<li>${item.trim()}</li>`).join("");

  const orderList = document.getElementById("order-history");
  orderList.innerHTML = data.history.map(order => `<li>${order}</li>`).join("");
}

async function fetchVendorFeed() {
  const res = await fetch("backend/fetch_vendors.php"); // Optional if you add vendor list
  const vendors = await res.json();

  const container = document.getElementById("vendor-feed");
  container.innerHTML = vendors.map(v => `
    <div class="vendor-card">
      <h3>${v.name}</h3>
      <p><strong>Ingredients:</strong> ${v.ingredients}</p>
      <p><strong>Price:</strong> ${v.price_per_unit}</p>
      <p><strong>Trust Score:</strong> ${'⭐'.repeat(v.trust_score)}</p>
      <button>Order Now</button>
    </div>
  `).join("");
}

async function submitSellerPost() {
  const content = document.getElementById("seller-post").value;
  if (!content) return alert("Post cannot be empty.");

  const res = await fetch("backend/seller_post.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ content })
  });

  alert(await res.text());
  document.getElementById("seller-post").value = "";
  fetchSellerPosts();
}

async function fetchSellerPosts() {
  const res = await fetch("backend/fetch_seller_posts.php");
  const posts = await res.json();

  const feed = document.getElementById("seller-feed");
  feed.innerHTML = posts.map(p =>
    `<div class="vendor-card"><p>${p.content}</p><small>${p.timestamp}</small></div>`
  ).join("");
}


document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("postContainer");

  fetch("backend/fetch_seller_posts.php")
    .then(response => response.json())
    .then(posts => {
      container.innerHTML = ""; // clear any previous content

      if (posts.length === 0) {
        container.innerHTML = "<p>No seller posts found.</p>";
        return;
      }

      posts.forEach(post => {
        const card = document.createElement("div");
        card.className = "card mb-3";
        card.innerHTML = `
          <div class="card-body">
            <h5 class="card-title">${post.product_name}</h5>
            <p class="card-text">Price: ₹${post.price}</p>
            <p class="card-text">Seller: ${post.seller_name}</p>
            ${post.image_url ? `<img src="${post.image_url}" class="img-fluid" style="max-width:200px;">` : ""}
          </div>
        `;
        container.appendChild(card);
      });
    })
    .catch(error => {
      console.error("Error fetching seller posts:", error);
      container.innerHTML = "<p>Error loading posts.</p>";
    });
});
