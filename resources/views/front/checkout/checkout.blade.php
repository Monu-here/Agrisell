{{-- this is with option --}}
@extends('front.layout')
@section('content')
    <style>
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #8a6fc1;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <section class="bg-light py-5">
        <div class="container">
            <form action="{{ route('front.checkout.checkout') }}" method="POST" onsubmit="return placeOrder(event);">
                @csrf
                <div class="row">
                    <div class="col-xl-8 col-lg-8 mb-4 mb-md-0">
                        <div class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Checkout</h5>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3"> <!-- Changed class to col-md-6 col-12 -->
                                        <p class="mb-0">Name</p>
                                        <div class="form-outline">
                                            <input type="text" id="checkoutmodal_name" name="name"
                                                placeholder="Type here" class="form-control" value="{{ $user->name }}"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12"> <!-- Changed class to col-md-6 col-12 -->
                                        <p class="mb-0">Address</p>
                                        <div class="form-outline">
                                            <input type="text" name="address" id="checkoutmodal_address"
                                                placeholder="Type here" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3"> <!-- Changed class to col-md-6 col-12 -->
                                        <p class="mb-0">Phone</p>
                                        <div class="form-outline">
                                            <input type="number" name="phone_number" id="checkoutmodal_phone"
                                                placeholder="Type here" class="form-control" maxlength="10"
                                                value="{{ $user->phone }}" minlength="10" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3"> <!-- Changed class to col-md-6 col-12 -->
                                        <p class="mb-0">Email</p>
                                        <div class="form-outline">
                                            <input type="email" id="checkoutmodal_email" name="email"
                                                placeholder="example@gmail.com" class="form-control"
                                                value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="p-3 bg-white h-100">
                            <h6 class="mb-3">Summary</h6>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total Product:</p>
                                <p class="mb-2" id="totalproductincart"></p>
                            </div>

                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">Rs. <strong id="total"> </strong></p>
                            </div>
                            <div class="row" id="checkout-holder">
                                <div class="col-6">
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="{{ route('front.index') }}"
                                                class="text-body text-decoration-none"><i
                                                    class="fas fa-long-arrow-alt-left me-2 "></i>Back to shop</a></h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class=" mt-5 d-flex justify-content-center justify-content-lg-end">
                                        <button type="submit"
                                            class="btn btn-success text-body text-decoration-none text-white"><i
                                                class="fa-solid fa-bag-shopping me-2 text-white"></i><span
                                                class="text-white">Checkout</span></button>
                                    </div>
                                </div>
                            </div>
                            <div id="spinner-holder" class="pt-2" style="display: none;">
                                <div class="mb-1 d-flex justify-content-center ">
                                    <div class="spinner"></div>
                                </div>
                                <div class="text-center">
                                    Checking Out
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var checkoutlock = false;

        function placeOrder(event) {
            event.preventDefault();
            if (checkoutlock) {
                return;
            }

            $('#checkout-holder').hide();
            $('#spinner-holder').show();

            // Get options for each product
            const orderOptions = CART.products.map(product => product.other.options);

            console.log('Order Options:', orderOptions);

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());
            data.products = CART.products.map((product, index) => {
                return {
                    name: product.productName,
                    qty: product.qty,
                    rate: product.price,
                    product_id: product.product_id,
                    option: orderOptions[index],
                };
            });

            console.log('Data to be Sent:', data);

            // Correct the property name to 'options'
            // data.option = JSON.stringify(orderOptions);
            $.post(event.target.action, data)
                .done(function(result) {
                    console.log('Checkout Success:', result);
                    CART.clear();
                    window.location.replace("{{ route('front.checkout.thankyou') }}");
                })
                .fail(function(error) {
                    console.error('Checkout Error:', error);
                });
        }


        $(document).ready(function() {
            renderCart();
            $('#totalproductincart').text(CART.products.length);
        });

        function loadTotal() {
            let total = 0;
            CART.products.forEach(product => {
                total += product.qty * product.price;
            });

            $('#total').html(total);
        }

        function removeFromCart(product_id) {
            CART.removeItem(product_id);
            renderCart();
        }

        function renderCart() {
            $('#itemTable').hide();
            $('#items').append(
                CART.products.map(product => `
                <div class="d-flex justify-content-between mb-2">
                    <strong>${product.productName}</strong>
                    <strong>${product.price}</strong>
                    <strong>${product.orderOptions}</strong>
                    <strong >${product.price * product.qty}</strong>
                    <img src="${product.other.image}" class="border rounded me-3" style="width: 96px; height: 96px;" />

                </div>
            `)
            );

            loadTotal();
        }

        const total = CART.getTotal().toFixed(2);
        $("#total").text(total);
    </script>
@endsection
