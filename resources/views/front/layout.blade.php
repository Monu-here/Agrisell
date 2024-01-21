<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}  @yield('title')</title>
    <link rel="stylesheet" href="{{ vasset('assets/front/index.css') }}">

    <meta name="theme-color" content="#8649ff" />
    @yield('css')
    <style>
        #mini-cart {
            position: absolute;
            top: -38px;
            left: -16px;
            padding: 6px 8px;
            background: #9AB5C8;
            height: 20px;
            width: 20px;
            display: flex;
            color: white;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            border-radius: 100%;
        }

        #mobileMinu-cart {
            position: absolute;
            top: -8px;
            padding: 6px 8px;
            background: #9AB5C8;
            height: 20px;
            right: -5px;
            width: 20px;
            display: flex;
            color: white;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            border-radius: 100%;
        }

        .btns {
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: white;
            cursor: pointer;
            padding: 8px 14px;
            color: #8649FF;
        }



        .go-top {
            position: fixed;
            bottom: 10%;
            right: 3%;
            padding: 20px;
            display: none;
            cursor: pointer;
            -webkit-font-smoothing: antialiased;
        }

        .go-top:after {
            font-family: FontAwesome;
            content: "\f106";
            background-color: #E5E8F0;
            padding: 10px 15px;
            color: #6a6e7c;
            position: absolute;
            bottom: 10px;
            font-size: 28px;
        }

        .go-top-text {
            position: absolute;
            width: 60px;
            text-align: center;
            font-family: 'Questrial';
            line-height: 1.5;
            letter-spacing: 3px;
            font-size: 12px;
            margin: 20px 0 0 -4px;
        }

        .go-top:hover {
            transition: all .4s linear;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .go-top {
                bottom: 5%;
                right: 15%;
                padding: 10px;
            }

            .go-top:after {
                font-size: 20px;
            }

            .go-top-text {
                width: 40px;
                font-size: 10px;
                margin: 10px 0 0 -2px;
            }

            .go-top:after {
                padding: 7px 10px;
            }
        }
    </style>
</head>


<body class="body">
    <div class="d-none d-md-block">
        <div class="nav">
            <button class="nav-button">
                @php
                    $logo = getLogoSetting();
                @endphp
                @if ($logo)
                    <img src="{{ vasset($logo->image) }}" alt="" srcset="" width="100px" height="100px"
                        style="margin-top: -3px; margin-left: -8px" onclick="window.location.replace('{{ route('front.index') }}')">
                @endif
            </button>
            <span>
                @php
                    $logo = getLogoSetting();
                @endphp
                @if ($logo)
                    <a href="{{ route('front.index') }}"
                        style="text-decoration: none; color:#212529">{{ $logo->logotext }}</a>
                @endif
            </span>
            <div class="left-icons icon">
                <div class="search-container">
                    <i class="fas fa-search search-icon search-here d-none"></i>
                </div>
                <i class="fa-regular fa-heart d-none"></i>
                <a href="{{ route('front.cart.index') }}" style="position: relative;color:black;text-decoration: none;">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="mini-cart" class="mini-cart menu_view"></span>
                </a>
            </div>
            @if (Auth::check())
                <div class="position-relative" style="top: 33px;right: 150px">

                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.index') }}"> <img class="rounded-circle"
                                src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                alt="" style="width: 40px; height: 40px" />
                        </a>
                    @else
                        <a href="{{ route('front.userdashboard') }}"> <img class="rounded-circle"
                                src="{{ Auth::user()->gImage }}" alt="" style="width: 40px; height: 40px" />
                        </a>
                    @endif
                </div>
            @else
                <button class="login-button login"><a href="{{ route('front.googlelogin') }}"
                        style="text-decoration: none; color:aliceblue;">Login</a></button>
            @endif
        </div>
        {{-- <marquee behavior="alternate" direction="left"
            style="margin-right: 100px; margin-left: 100px; background: red; color: white">monu</marquee> --}}
    </div>

    <div class="d-block d-md-none">
        <nav class="navbar navbar-expand-lg sticky-top" style="background: #8649FF">
            <div class="container">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div>
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="modal"
                            data-bs-target="#mobileMenuModal" style="color: white">
                            <i class="fas fa-bars" style="color: white"></i>
                        </button> --}}
                        @php
                            $logo = getLogoSetting();
                        @endphp
                        @if ($logo)
                            <a href="{{ route('front.index') }}"
                                style="text-decoration: none; color: white; font-size: 17px">{{ $logo->logotext }}</a>
                        @endif

                    </div>
                    <div class="text-end" style="display: flex; text-align: center">

                        <a href="{{ route('front.cart.index') }}"
                            style="position: relative;color:black;text-decoration: none;
                            right: 22px;
                            top: 7px;
                        ">
                            <i class="fa-solid fa-cart-shopping"
                                style="    position: relative;
                        color: white; font-size:18px; right:5px; top:3px;

                        "></i>
                            <span id="mobileMinu-cart" class="menu_view"></span>
                        </a>
                        @if (Auth::check())
                            <div class="position-relative">

                                <a href="{{ route('front.userdashboard') }}"> <img class="rounded-circle"
                                        src="{{ Auth::user()->gImage }}" alt=""
                                        style="width: 40px; height: 40px" /></a>
                            </div>
                        @else
                            <a href="{{ route('front.googlelogin') }}"
                                style="text-decoration: none; color:rgb(12, 130, 233);">
                                <button class="btns  mx-2" type="button"><i class="fa-solid fa-user me-2"></i>Login
                                </button>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </nav>

        {{-- <div class="modal fade" id="mobileMenuModal" tabindex="-1" aria-labelledby="mobileMenuModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mobileMenuModalLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.index') }}" data-aos="fade-down"
                                    data-aos-duration="1000">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-aos="fade-down"
                                    data-aos-duration="1000">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-aos="fade-down"
                                    data-aos-duration="1000">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="go-top">
        <p class="go-top-text" id="goToTopBtn">Top</p>
    </div>
    @yield('content')
    @include('front.layout.footer')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ vasset('assets/front/js/cart.js') }}"></script>
    @include('tostar.index')
    <script>
        showToastr();
        CART.updateMiniCart();
        $(function() {

            if(window.innerWidth>768){

                $(window).scroll(function() {
                    var scrolled = $(window).scrollTop();
                    if (scrolled > 200) $('.go-top').fadeIn('slow');
                    if (scrolled < 200) $('.go-top').fadeOut('slow');
                });

                $('.go-top').click(function() {
                    $("html, body").animate({
                        scrollTop: "0"
                    }, 300);
                });
            }

        });
    </script>

    @yield('script')
</body>

</html>
