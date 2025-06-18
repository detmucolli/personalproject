// Login
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.onsubmit = async (e) => {
        e.preventDefault();
        const formData = new FormData(loginForm);
        const res = await fetch('../../backend/controllers/login.php', {
            method: 'POST',
            body: formData
        });
        document.getElementById('loginMsg').innerText = await res.text();
    };
}

// Signup
const signupForm = document.getElementById('signupForm');
if (signupForm) {
    signupForm.onsubmit = async (e) => {
        e.preventDefault();
        const formData = new FormData(signupForm);
        const res = await fetch('../../backend/controllers/signup.php', {
            method: 'POST',
            body: formData
        });
        document.getElementById('signupMsg').innerText = await res.text();
    };
}

// Product List
const productList = document.getElementById('productList');
if (productList) {
    fetch('../../backend/controllers/get_products.php')
        .then(res => res.json())
        .then(products => {
            productList.innerHTML = products.map(p => `
                <div>
                    <h3>${p.name}</h3>
                    <p>${p.description}</p>
                    <p>Price: $${p.price}</p>
                    <img src="${p.image}" width="100" />
                </div>
            `).join('');
        });
}