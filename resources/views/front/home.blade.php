@extends('front.layout')
@section('css')
    <style>
        .submit {
            border: none;
        }

        .submit:hover {
            /* border: 2px solid #1aada3; */
            background-color: #1a0f0f;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="d-none d-md-block">
        <div id="carouselDesktop" class="carousel slide" data-bs-ride="carousel"
            style="margin-left: 100px; margin-right: 100px">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == '0' ? 'active' : '' }} ">
                        @if ($slider->image)
                            <img src="{{ vasset($slider->image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                {{-- <button class="submit"
                                    style="padding:{{ $slider->btn_padding }}; background:{{ $slider->btn_bg_color }};height:{{ $slider->btn_height }};color:{{ $slider->btn_text_color }};border-radius:{{ $slider->btn_border_radius }};position:{{ $slider->btn_position }};{{ $slider->other }}">
                                    {{ $slider->btn_text }}
                                </button> --}}
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDesktop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDesktop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        {{-- <marquee behavior="alternate" direction="left" style="margin-right: 100px; margin-left: 100px; background: red; color: white">

            This is official website.

        </marquee> --}}
        <div class="home-main mb-4">
            <div class="control"></div>
            <div class="main-wrapper">
                <div class="category">
                    <h3 class="category-title"></h3>
                    <div class="category-holder " id="desktop-categorys">
                    </div>
                </div>
                <div class="product">
                    <div class="row" id="desktop-products">
                    </div>
                </div>
            </div>
            <div class="control"></div>
        </div>
    </div>
    <style>
        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Apply the animation to the element */
        .blink {
            animation: blink 1s infinite;
            /* 1s duration, infinite loop */
        }

        .scroll-more {
            position: fixed;
            bottom: 0px;
            z-index: 1;
            background: rgba(0, 0, 0, 0.4);
            padding: 10px;
            left: 0px;
            right: 0px;
            color: white;
            text-align: center;
            font-size: 13px;
            transition: 0.2s all;
        }

        .scroll-more.hide {
            height: 0px;
            overflow: hidden;
            padding: 0px;
        }
    </style>
    <div class="d-block d-md-none">
        <section class="mobile-view">

            <div class="mobileSlider-controller" id="slideshowmobile">
                <div id="carouselMobile" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == '0' ? 'active' : ' ' }} ">
                                @if ($slider->image)
                                    <img src="{{ vasset($slider->mobile_image) }}" class="" alt="...">
                                @endif

                            </div>
                        @endforeach
                    </div>
                    @if ($sliders->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <div id="mobilcategory" class="">
                    <div class="d-flex" id="mobilecategory-holder">
                    </div>
                </div>
                <section class="mobileProductSection pt-3 mt-2">
                    <div id="mobileProduct">
                        <div class="mobileProduct-container">
                            <div class="mobileProduct-holder row m-0 " id="mobile-products">
                            </div>
                        </div>
                    </div>
                </section>
                @include('front.layout.footerhome')
            </div>
        </section>
        <div class="scroll-more">
            Scroll to view more
            <br>
            <img class="blink" src="{{ vasset('assets/front/image/scroll.png') }}" alt="" style="width:30px;">
        </div>
    </div>






    {{-- service section start --}}
    {{-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <h6 class="text-primary text-uppercase">Services</h6>
                        <h1 class="display-5">Organic Farm Services</h1>
                    </div>
                    <p class="mb-4">Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum et tempor sit. Clita
                        erat ipsum et lorem et sit sed stet labore</p>
                    <a href="" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-carrot display-1 text-primary mb-3"></i>
                        <h4>Fresh Vegetables</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor
                            vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-apple-alt display-1 text-primary mb-3"></i>
                        <h4>Fresh Fruits</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor
                            vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-dog display-1 text-primary mb-3"></i>
                        <h4>Healty Cattle</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor
                            vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-tractor display-1 text-primary mb-3"></i>
                        <h4>Modern Truck</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor
                            vero</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-seedling display-1 text-primary mb-3"></i>
                        <h4>Farming Plans</h4>
                        <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor
                            vero</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- service section end  --}}




    {{-- team section start --}}

    {{-- <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">The Team</h6>
                <h1 class="display-5">We Are Professional Organic Farmers</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100"
                                    src="https://img.freepik.com/free-photo/businessman-shows-his-finger-up_329181-9112.jpg?w=360&t=st=1705767242~exp=1705767842~hmac=b22971fc43dab2d3acaab69f909d0a486d707033c6df68f0966a687c4af4d579"
                                    alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                    style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white">Farmer Name</h4>
                                    <span class="text-white">Designation</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div
                                class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100"
                                    src="https://img.freepik.com/free-photo/businessman-shows-his-finger-up_329181-9112.jpg?w=360&t=st=1705767242~exp=1705767842~hmac=b22971fc43dab2d3acaab69f909d0a486d707033c6df68f0966a687c4af4d579"
                                    alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                    style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white">Farmer Name</h4>
                                    <span class="text-white">Designation</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div
                                class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100"
                                    src="https://img.freepik.com/free-photo/businessman-shows-his-finger-up_329181-9112.jpg?w=360&t=st=1705767242~exp=1705767842~hmac=b22971fc43dab2d3acaab69f909d0a486d707033c6df68f0966a687c4af4d579"
                                    alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4"
                                    style="background: rgba(52, 173, 84, .85);">
                                    <h4 class="text-white">Farmer Name</h4>
                                    <span class="text-white">Designation</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div
                                class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-linkedin-in text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i
                                        class="fab fa-instagram text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- team section end --}}










    </section>
@endsection
@section('script')
    @include('front.home.category')
    @include('front.home.product')
    @include('front.home.mobilproduct')
    @include('front.order.ordermodal')
    @include('front.indexJavaScript')
    @include('tostar.index')
    <script>
        function addToCarts(product_id) {
            const product = products.find(o => o.id == product_id);
            CART.addproduct(parseInt(product.id), product.name, 1, product.sale_price, {
                image: product.image
            });
            CART.updateMiniCart();
        }
        // showToastr();
    </script>
@endsection
