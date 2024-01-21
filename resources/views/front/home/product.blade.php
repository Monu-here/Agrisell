<script>
    // const productDataElement = document.getElementById('product-data');
    // const product = JSON.parse(productDataElement.getAttribute('data-product'));

    const url = "{{ route('front.product', ['id' => 'xxx_id']) }}";
    const shareurl = "{{ route('front.share', ['id' => 'xxx_id']) }}?xxx_name";
    const renderDesktopProduct = (product) => {
        const productURL = url.replace('xxx_id', product.id);
        return `



        <div class="col-md-3 mb-3">
            <div class="image">
                <a href="${productURL}" >
                    <img src="/${product.image}?v={{ config('share.version') }}" alt="" srcset="">
                </a>

                <div class="overlay">
                    <div class="title">
                        <a href="${productURL}" style="color:#8649FF">
                            ${product.name}
                        </a>
                        <div class="col-12 pb-0  prices">
                            <span class="price pe-1" style="color:#F85606">Rs. ${product.price}</span>
                            <span class="sale-price" style="color:#F4F27E">Rs. ${product.sale_price}</span>
                        </div>
                    </div>

                    <div class="row m-0 px-2" id="buttons">
                        <hr>
                        <div class=" px-2 col-6">
                            <a class="button  w-100" onclick="event.preventDefault();startOrder(${product.id},'${product.option}');" >  <i class="fa-solid fa-wallet m-1"></i>   Buy Now</a>
                        </div>

                        <div class=" px-2 col-6">

                            <a class="button w-100" href="${productURL}" style = "text-decoration:none;"> <i class="fa-solid fa-cart-shopping m-1"></i> Add to Cart</a>
                        </div>
                        <div class=" px-2 pt-2 col-12">

                            <a class="button w-100" target="_blank"
                                href="${product.me_link}?text=${encodeURI(shareurl.replace('xxx_id',product.id).replace('xxx_name',product.name))}"><i class="fa-brands fa-facebook-messenger m-1"></i> Message
                                Us</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        `;
    }
</script>
<style>
    .col-12.pb-3.m-1.prices {
        padding: 5px;
    }
</style>
