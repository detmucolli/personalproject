// This file contains the JavaScript code for the frontend, handling user interactions and making API calls to the backend.

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const productList = document.getElementById('product-list');
    const cart = [];

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(loginForm);
            fetch('/backend/routes/auth.php/login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/frontend/pages/products.html';
                } else {
                    alert(data.message);
                }
            });
        });
    }

    if (signupForm) {
        signupForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(signupForm);
            fetch('/backend/routes/auth.php/signup', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Signup successful! Please log in.');
                    window.location.href = '/frontend/pages/login.html';
                } else {
                    alert(data.message);
                }
            });
        });
    }

    if (productList) {
        fetch('/backend/routes/products.php')
        .then(response => response.json())
        .then(products => {
            products.forEach(product => {
                const productItem = document.createElement('div');
                productItem.className = 'product-item';
                productItem.innerHTML = `
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <p>Price: $${product.price}</p>
                    <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                `;
                productList.appendChild(productItem);
            });

            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    cart.push(productId);
                    alert('Product added to cart!');
                });
            });
        });
    }
});