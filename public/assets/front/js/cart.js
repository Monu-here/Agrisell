const CART = {
    products: [],
    constructor: function () {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
    },

    addproduct: function (product_id, productName, qty, price, other = null) {
        console.log(other);
        this.products = JSON.parse(localStorage.getItem("products")) || [];

        let productIndex = this.products.findIndex(
            (product) => product.product_id === product_id
        );
        if (productIndex !== -1) {
            // product already in cart, update quantity
            this.products[productIndex].qty += parseInt(qty);
        } else {
            // new product, add to cart
            this.products.push({ product_id, productName, qty, price, other });
        }
        localStorage.setItem("products", JSON.stringify(this.products));
        toastr.success(`${productName} sucessfully added to cart.`);

    },
    clear: function () {
        this.products = [];
        localStorage.setItem("products", JSON.stringify(this.products));
    },

    // quanty input
    updateQuantity(product_id, newQuantity) {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
        const product = this.products.find((p) => p.product_id === product_id);
        if (product) {
            product.qty = newQuantity;
        }
        localStorage.setItem("products", JSON.stringify(this.products));
    },
    editproduct: function (product_id, qty) {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
        let productIndex = this.products.findIndex(
            (product) => product.product_id === product_id
        );
        if (productIndex !== -1) {
            this.products[productIndex].qty = qty;
        }
        localStorage.setItem("products", JSON.stringify(this.products));
    },

    removeproduct: function (product_id) {
        this.products = JSON.parse(localStorage.getItem("products")) || [];
        this.products = this.products.filter(
            (product) => product.product_id !== product_id
        );
        localStorage.setItem("products", JSON.stringify(this.products));
        this.updateMiniCart();
    },

    getTotal: function () {
        return this.products.reduce(
            (acc, product) => acc + product.qty * product.price,
            0
        );
    },

    inCart: function (product_id, type) {
        let productIndex = this.products.findIndex(
            (product) =>
                product.product_id === product_id && product.type == type
        );
        return productIndex > -1;
    },
    clear: function () {
        this.products = [];
        localStorage.setItem("products", JSON.stringify(this.products));
    },

    updateMiniCart: function () {
        $(".menu_view").html(this.products.length);
    },

    updateCartMobile: function () {
        $("#mobileMinu-cart").html(this.products.length);
    },
};

CART.constructor();
