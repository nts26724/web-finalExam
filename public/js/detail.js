document.addEventListener('DOMContentLoaded', function() {
    function showSimilarProductDetails(product) {
        document.getElementById("product-name").innerText = product.name;
        document.getElementById("product-image").src = product.image;
        document.getElementById("product-price").innerText = product.price;
        document.getElementById("product-description").innerText = product.description;
    }

    function displaySimilarProducts(products) {
        const similarProductsContainer = document.querySelector(".similar-products .row");
        similarProductsContainer.innerHTML = ''; //xoa nd
        products.forEach(product => {
            const productElement = document.createElement("div");
            productElement.classList.add("col-lg-3", "col-md-6", "col-sm-12", "mx-4", "rounded-4", "mb-4");
            productElement.innerHTML = `
            <div class="card">
                <img src="${product.image}" class="card-img-top p-3" alt="${product.name}">
                <div class="card-body text-center">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${product.price}</p>
                    <a href="#" class="btn btn-bn" onclick='showSimilarProductDetails(${JSON.stringify(product)})'>Xem chi tiết</a>
                </div>
            </div>
            `;
            similarProductsContainer.appendChild(productElement);
        });
    }
// lay api
    fetch('/api/similar-products')
        .then(response => response.json())
        .then(data => {
            displaySimilarProducts(data);
        })
        .catch(error => {
            console.error('Error fetching similar products:', error);
        });
});
