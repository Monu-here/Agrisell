

@extends('front.layout')
@section('content')
@section('css')
@endsection
<div class="d-none d-md-block">
    <section class="h-100 h-custom" style="background-color: #F6F7FB;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Your Cart</h1>
                                        </div>
                                        <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center"
                                            id="herecartlist">
                                        </div>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{ route('front.index') }}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Place Your order</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-capitalize"> Product in cart : </h5>
                                            <span id="totalproductincart"></span>
                                        </div>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-capitalize">Total price</h5>
                                            <h5 id="total"></h5>
                                        </div>



                                        @if (Auth::check())
                                            <a href="{{ route('front.checkout.checkout') }}">

                                                <button type="button" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Checkout</button>
                                            </a>
                                        @else
                                            <a href="{{ route('front.googlelogin') }}?urldata={{urlencode(route('front.checkout.checkout'))}}">

                                                <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Login to checkout</button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="d-block d-md-none" style="min-height:100vh">
    <div class="text-center p-2 text-capitalize">
        <h5>Your Shopping Cart</h5>
    </div>
    <div class="container" id="heremobilecart">
    </div>
    <div class="container" style="position:sticky;bottom:0px;">

        <div class="bg-white p-3 shadow" style=" border-radius:10px;">
            <div class=" d-flex align-items-center justify-content-between">
                <strong>
                    Products
                </strong>
                <strong id="mobiletotalcart"></strong>
            </div>
            <div class=" d-flex align-items-center justify-content-between">
                <strong>
                    Total
                </strong>
                <strong id="mobiletotalprice"></strong>
            </div>
            <hr class="my-1">
            <div>
                @if (Auth::check())
                    <a href="{{ route('front.checkout.checkout') }}" class="btn btn-dark w-100 ">
                        Checkout
                    </a>
                @else
                    <a href="{{ route('front.googlelogin') }}?urldata={{urlencode(route('front.checkout.checkout'))}}" class="btn btn-dark w-100 ">
                        Login to checkout
                    </a>
                @endif
            </div>

        </div>
    </div>

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function() {
        renderCart();
        mobilerenderCart();
    });

    function removeFromCart(product_id) {
        CART.removeproduct(product_id);
        renderCart();
        mobilerenderCart();
    }

    function updateQuantity(product_id, change) {
        const inputElement = document.getElementById(`quantity-${product_id}`);
        const inputElements = document.getElementById(`quantitys-${product_id}`);
        const currentQuantity = parseInt(inputElement.value);
        let newQuantity = currentQuantity + change;

        if (newQuantity < 1) {
            newQuantity = 1;
        }

        CART.updateQuantity(product_id, newQuantity);

        inputElement.value = newQuantity;
        inputElements.value = newQuantity;

        renderCart();
        mobilerenderCart();
    }

    function renderTotal() {
        const total = CART.getTotal().toFixed(2);
        const length = CART.products.length;

        $('#total').text(`Rs. ${total}`);
        $('#mobiletotalprice').text(`Rs. ${total}`);

        console.log(length);
        $('#totalproductincart').text(length);
        $('#mobiletotalcart').text(length);


    }
    const renderCart = () => {
        const cartItemsHtml = CART.products.map(product => `

            <div class="col-md-2 col-lg-2 col-xl-2">
             <img src="${product.other.image}" style="width:100px">
             </div>
             <div class="col-md-3 col-lg-3 col-xl-3">
              <h6 class="text-muted">Product Name :  ${product.productName}</h6>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex mb-3">
                <button class="btn btn-link px-2" onclick="updateQuantity(${product.product_id}, -1)"> <i class="fas fa-minus"></i> </button>
                <input  min="0" name="quantity" type="number" class="form-control form-control-sm text-center" value="${product.qty}" min="1" id="quantity-${product.product_id}" onchange="updateQuantity(${product.product_id}, this.value)" style="width:100px;">
                <button class="btn btn-link px-2" onclick="updateQuantity(${product.product_id},1)"> <i class="fas fa-plus"></i>  </button>
            </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 mb-3">
                 <h6 class="mb-0">Rs. ${product.price}</h6>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 ">
                <a  class="text-muted" style="cursor: pointer"><i class="fa-solid fa-trash" onclick="removeFromCart(${product.product_id})")"></i></a>
                </div>
                <hr class="my-4">


            `).join("");
        renderTotal();
        $('#herecartlist').html(cartItemsHtml);
    };
    const mobilerenderCart = () => {
        const cartItemsHtmls = CART.products.map(product => `
        <div class="d-flex bg-white p-3 mb-2" style="border-radius:10px;">
            <div class="d-flex  align-items-center " style="height:80px;width:80px;box-shadow:0px 0px 3px 0px rgba(0,0,0,0.3);overflow:hidden;border-radius:10px;" >
                <img class="w-100" src="${product.other.image}"alt="" >
            </div>
            <div class="px-3" style="flex:1;">
                <div style="font-weight:600;color:#8649FF;display:flex;">
                    <span class="w-75 d-inline-block">
                        ${product.productName}
                    </span>
                    <small  class="w-25 d-inline-block text-center text-danger" onclick="removeFromCart(${product.product_id})")" >
                        Remove
                    </small>
                </div>
                <hr class=" mb-2"/>
                <div class="row align-items-center">
                    <div class="col-6"  style="font-weight:600;color:#8649FF; font-size:12px;">Rs. ${product.price}</div>
                    <div class="col-6 p-0">
                        <div class="d-flex" style="font-size:12px;">
                            <span style="width:30px;background:#212529;height:30px;color:white;display:inline-flex;align-items:center;justify-content:center;font-size:12px;border-radius:50%;">
                                <i class="fas fa-minus" onclick="updateQuantity(${product.product_id}, -1)"></i>
                            </span>
                            <input  style="flex:1;text-align:center;border:none;font-weight:600;" min="0" name="quantity" type="number"  value="${product.qty}" min="1" id="quantitys-${product.product_id}" onchange="updateQuantity(${product.product_id}, this.value)">
                            <span  style="width:30px;background:#212529;height:30px;color:white;display:inline-flex;align-items:center;justify-content:center;font-size:12px;border-radius:50%;">
                                <i  class="fas fa-plus" onclick="updateQuantity(${product.product_id}, 1)"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            `).join("");
        renderTotal();
        $('#heremobilecart').html(cartItemsHtmls);
    };
</script>
@endsection
