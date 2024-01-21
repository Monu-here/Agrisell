<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce Admin Panel - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> --}}
    <link rel="stylesheet" href="{{ vasset('assets/back/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    @yield('css')
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
</style>

<body id="body-pd">
    <header class="header" id="header">
        <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="linkbar" style="font-size: 22px; display: inline; margin-left: 10px">
            <a href="{{ route('admin.index') }}">Dashboard</a> @yield('linkbar')

        </div>


        {{-- <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div> --}}
        {{-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> --}}
    </header>
    <div class="d-none d-md-block">

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">Admin Panel</span>
                    </a>
                    <div class="nav_list">
                        <a href="{{ route('admin.index') }}" class="nav_link active">
                            <i class="fa-solid fa-gauge"></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{ route('admin.order.index', ['status' => 1]) }}" class="nav_link"><i
                                class="fa-brands fa-first-order"></i>
                            <span class="nav_name">Manage Orders</span> </a>
                        <a href="{{ route('admin.slider.index') }}" class="nav_link"><i class="fa-solid fa-sliders"></i>
                            <span class="nav_name">Slider</span> </a>
                        <a href="{{ route('admin.category.index') }}" class="nav_link"><i class="fa-solid fa-list"></i>
                            <span class="nav_name">Category</span> </a>
                        <a href="{{ route('admin.product.index') }}" class="nav_link"> <i
                                class="fa-solid fa-cart-shopping"></i>
                            <span class="nav_name">Product</span> </a>
                        <a href="{{ route('admin.logofooter.add') }}" class="nav_link"> <i class="fa-solid fa-plus"></i>
                            <span class="nav_name">Logo/Footer Setting</span> </a>
                        <a href="{{ route('admin.setting.add') }}" class="nav_link"> <i class="fa-solid fa-gear"></i>
                            <span class="nav_name">Setting</span> </a>
                        <a href="{{ route('admin.rate.index') }}" class="nav_link"> <i class="fa-solid fa-star"></i>
                            <span class="nav_name">Review</span> </a>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">Logout</span> </a>
            </nav>
        </div>
    </div>
    <div class="d-block d-md-none">

        <div id="myNav" class="mobileslider-overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="{{ route('admin.index') }}" class="nav_link active" style="font-size: 22px;">
                    <i class="fa-solid fa-gauge"></i> <span class="nav_name">Dashboard</span> </a>
                <a href="{{ route('admin.order.index', ['status' => 1]) }}" class="nav_link"
                    style="font-size: 22px;"><i class="fa-brands fa-first-order"></i>
                    <span class="nav_name">Manage Orders</span> </a>
                <a href="{{ route('admin.slider.index') }}" class="nav_link" style="font-size: 22px;"><i
                        class="fa-solid fa-sliders"></i>
                    <span class="nav_name">Slider</span> </a>
                <a href="{{ route('admin.category.index') }}" class="nav_link" style="font-size: 22px;"><i
                        class="fa-solid fa-list"></i>
                    <span class="nav_name">Category</span> </a>
                <a href="{{ route('admin.product.index') }}" class="nav_link" style="font-size: 22px;"> <i
                        class="fa-solid fa-cart-shopping"></i>
                    <span class="nav_name">Product</span> </a>
                <a href="{{ route('admin.logofooter.add') }}" class="nav_link" style="font-size: 22px;"> <i
                        class="fa-solid fa-plus"></i>
                    <span class="nav_name">Logo/Footer Setting</span> </a>
                <a href="{{ route('admin.setting.add') }}" class="nav_link" style="font-size: 22px;"> <i
                        class="fa-solid fa-gear"></i>
                    <span class="nav_name">Setting</span> </a>
                <a href="{{ route('logout') }}" class="nav_link" style="font-size: 22px;"> <i
                        class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div>
        </div>


    </div>
    <!--Container Main start-->

    <div class="main p-md-3 p-2">
        {{-- <div id="jumbo" class="shadow d-flex align-items-center justify-content-between"> --}}
        {{-- <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div> --}}
        {{-- <div class="linkbar">
                <a href="{{ route('admin.index') }}">Dashboard</a> @yield('linkbar')
            </div> --}}
        <div class="toolbar">
            @yield('toolbar')
        </div>
    </div>
    @yield('content')

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @include('tostar.index')
     @yield('scripts')
    <script>
       
        var loading = document.getElementById('preloader');
        window.onload = () => {
            showToastr();

        }
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

        });

        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>


</html>
