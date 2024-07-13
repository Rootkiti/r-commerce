document.addEventListener('DOMContentLoaded', function () {
    const moreInfoLinks = document.querySelectorAll('.more-info');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemsList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    let cart = [];

    moreInfoLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const description = this.dataset.description;
            alert(description);
        });
    });

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productName = this.dataset.name;
            const productCost = parseFloat(this.dataset.cost.replace('$', ''));

            addToCart(productName, productCost);
        });
    });

    function addToCart(name, cost) {
        const product = cart.find(item => item.name === name);
        if (product) {
            product.quantity += 1;
        } else {
            cart.push({ name, cost, quantity: 1 });
        }

        renderCart();
    }

    function renderCart() {
        cartItemsList.innerHTML = '';
        let total = 0;

        cart.forEach(item => {
            const li = document.createElement('li');
            li.textContent = `${item.name} x ${item.quantity} - $${(item.cost * item.quantity).toFixed(2)}`;
            cartItemsList.appendChild(li);
            total += item.cost * item.quantity;
        });

        cartTotal.textContent = `$${total.toFixed(2)}`;
    }

    const searchInput = document.getElementById('search');
    const categorySelect = document.getElementById('category');

    searchInput.addEventListener('input', filterProducts);
    categorySelect.addEventListener('change', filterProducts);

    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedCategory = categorySelect.value;
        const productItems = document.querySelectorAll('.product-item');

        productItems.forEach(item => {
            const productName = item.querySelector('h2').innerText.toLowerCase();
            const productCategory = item.querySelector('img').alt.toLowerCase();

            if ((selectedCategory === 'all' || productCategory.includes(selectedCategory)) &&
                productName.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
});
