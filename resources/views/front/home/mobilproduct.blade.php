<script>
    const renderMobileproduct = (product, key) => {
        const productURLS = url.replace('xxx_id', product.id);
        console.log(key, product, "product");
        return `
        <div class="col-6 pb-1 ${(key +1) % 2 != 0 ? 'pe-1' : 'ps-1'}">
            <div class="card p-0 mb-1">
                <div class="card-bg">
                    <a href="${productURLS}">
                        <img src="/${product.image}?v={{ config('share.version') }}" alt="Image" style="">
                    </a>
                </div>
                <div class="p-1">
                    <h6 class="card-title pt-1 ps-2 mb-0">${product.name}</h6>
                    <div class="card-price ps-2">
                        <div class="price">rs.${product.price}</div>
                        <div class="ms-3">rs.${product.sale_price}</div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-6 p-0 buy ">
                        <a class="d-block" onclick="event.preventDefault();startOrder(${product.id},'${product.option??''}')">
                            <i class="fa-solid fa-wallet"></i> <br/>
                            Buy Now
                        </a>
                    </div>
                    <div class="col-6 p-0 cart ">

                        <a class="d-block"  href="${productURLS}" style = "text-decoration:none;">
                            <i class="fa-solid fa-cart-shopping"></i> <br/>
                            Add To Cart
                        </a>
                    </div>
                    <div class="col-12 p-1">
                        <a class="mes" target="_blank"
                        href="${product.me_link}?text=${encodeURI(shareurl.replace('xxx_id',product.id).replace('xxx_name',product.name))}" style="text-decoration: none; color="white";
">
                        <i class="fa-brands fa-facebook-messenger"></i>
                        Message
                        Us</a>
                    </div>

                </div>
            </div>
        </div>
`;

    }
</script>
