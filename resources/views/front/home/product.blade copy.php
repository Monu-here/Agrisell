<div class="col-md-3">
    <div class="image">
        <img src="{{ vasset($product->image) }}" alt="" srcset="">
        <div class="overlay">
            <div class="title">
                {{ $product->name }}
            </div>
            <div class="row m-0 px-3">
                <hr>
                <div class="col-12 pb-3 m-1 prices">
                    <span class="price pe-1">Rs. {{ $product->price }}</span>
                    <span class="sale-price">Rs. {{ $product->sale_price }}</span>
                </div>
                <hr>
            </div>
            <div class="row m-0 px-2" id="buttons">
                <hr>
                <div class=" px-2 col-6">

                    <a class="button w-100">Buy Now</a>

                </div>

                <div class=" px-2 col-6">
                    <a class="button w-100">Add to Cart</a>
                </div>
                <div class=" px-2 pt-2 col-12">
                    <a class="button w-100" target="_blank" href="https://m.me/PathibharadeviFancystore?text=https%3A%2F%2Fsabalskkss.com.np%2Fservice-single%2F8">Message
                        Us</a>

                </div>
            </div>
        </div>
    </div>
</div>

