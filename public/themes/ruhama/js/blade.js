// cart.js

window.Cart = {
    getItems() {
        try {
            return JSON.parse(Cart._getCookie('cart') || '[]');
        } catch {
            return [];
        }
    },

    addItem(item) {
        const cart = Cart.getItems();
        const existing = cart.findIndex(p =>
            p.product_id == item.product_id && p.variant_id == item.variant_id
        );

        if (existing !== -1) {
            cart[existing].quantity += item.quantity;
        } else {
            cart.push(item);
        }

        Cart._setCookie('cart', JSON.stringify(cart), 7);
        Cart.updateHeaderCount();
    },

    getTotalQuantity() {
        return Cart.getItems().reduce((sum, item) => sum + item.quantity, 0);
    },
    removeItem(productId, variantId = null) {
        let cart = Cart.getItems();
        cart = cart.filter(item => !(item.product_id == productId && item.variant_id == variantId));
        Cart._setCookie('cart', JSON.stringify(cart), 7);
        Cart.updateHeaderCount();
    },

    updateHeaderCount() {
        const count = Cart.getTotalQuantity();
        const badge = document.getElementById('cart-count');
        if (badge) badge.textContent = count;
    },

    _setCookie(name, value, days) {
        const expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
    },

    _getCookie(name) {
        return document.cookie.split('; ').reduce((acc, cookie) => {
            const [key, val] = cookie.split('=');
            return key === name ? decodeURIComponent(val) : acc;
        }, '');
    }
};

    document.addEventListener('DOMContentLoaded', function () {
        if (window.Cart && typeof Cart.updateHeaderCount === 'function') {
            Cart.updateHeaderCount();
        }
    });
