@extends('front.layout')
@section('css')
@endsection
@section('content')
    <div class="dashboard-pagee mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pb-3">
                    <div class="bg-white shadow">
                        <div class="card-body" style="padding: 1rem 1rem">
                            <div class="p-4" id="first-selector-image">
                                <div class="imagess">
                                    <img id="image-display" src="{{ $user->gImage }}" alt="">
                                </div>
                            </div>

                            <div id="first-selector-name" class="">
                                <input type="text" value="{{ $user->name }}" id="name-input">
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between info">
                                <span>
                                    <i class="fa-solid fa-user-clock"></i>
                                    <span>Member Since</span>
                                </span>
                                <span>
                                    @if ($user->login_date)
                                        {{ (new DateTime($user->login_date))->format('F j, Y') }}
                                    @endif
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between info">
                                <span>
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Phone Number</span>
                                </span>
                                <span>
                                    @if ($user->phone)
                                        {{ $user->phone }}
                                    @endif
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-end info">

                                <span>
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <a href="{{ route('ulogout') }}" style="text-decoration: none; color: #000;">Logout</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    {{-- <div class="bg-white shadow mb-3">
                        <div class="card-body " id="jumbotron" style="padding: 1rem 1rem">
                            <a href="https://khazom.gharsaaman.com/vendor/dashboard">Dashboard</a>
                        </div>
                    </div> --}}
                    @if ($orders->count() > 0)
                        <div id="info">
                            <div class="card-body px-0 px-md-4" style="font-weight: 700;">
                                <h4 style="color:#6F19AA;font-weight:700;" class="mb-3">My Orders</h4>
                                <div class="sticky-top d-none d-md-block pb-2">
                                    <div class="p-3 bg-white" style="box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1)">
                                        <div class="row">
                                            <div class="col-md-2">
                                                Image
                                            </div>
                                            <div class="col-md-5">
                                                Product
                                            </div>
                                            <div class="col-md-2">
                                                Quantity
                                            </div>
                                            <div class="col-md-3">
                                                Status
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body ">



                                        @foreach ($orders as $order)
                                            <div class="row single-order">
                                                <div class="col-md-2 col-4 pb-2">
                                                    <img src="{{ vasset($order->image) }}"  class="img-fluid" alt="">
                                                </div>
                                                <div class="col-8 d-block d-md-none">
                                                    {{ $order->name }} <br>
                                                    <strong >Quantity: </strong> {{ $order->qty }} Pcs <br>
                                                    {{ $order->status }}
                                                </div>
                                                <div class="col-md-5   d-none d-md-block">
                                                    {{ $order->name }}
                                                </div>

                                                <div class="col-md-2  d-none d-md-block">
                                                    {{ $order->qty }} Pcs
                                                </div>
                                                <div class="col-md-3  d-none d-md-block text-{{ $statusColors[$order->status] }}">
                                                    {{ $statusNames[$order->status] }}
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="order-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="gradient-custom hidden-text" id="hiddenText">
                                        <div class="container py-5">
                                            <div class="row idden-text">
                                                <div class="col-md-12">
                                                    <div class="card" style="border-radius: 10px;">

                                                        <div class="card-body p-4 h">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-4">
                                                                <p class="lead fw-normal mb-0" style="color:#6F19AA;">My
                                                                    Order
                                                                </p>
                                                            </div>
                                                            <div class="card shadow-0 border mb-4">
                                                                <div class="card-body ">
                                                                    <div class="row">
                                                                        @php
                                                                            $totalOrderLength = 0;
                                                                        @endphp
                                                                        @foreach ($orders as $order)
                                                                            <div class="col-md-1 pb-2">
                                                                                <img src="{{ vasset($order->image) }}"
                                                                                    class="img-fluid" alt="">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                                <p class="text-muted mb-0">Product Name:
                                                                                    {{ $order->name }}</p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                                <p class="text-muted mb-0">Phone:
                                                                                    {{ $order->phone_number }}</p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                                <p class="text-muted mb-0 small">Quantity:
                                                                                    {{ $order->qty }}</p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                                                <p class="text-muted mb-0 small">Address
                                                                                    {{ $order->address }}</p>
                                                                            </div>
                                                                            @php
                                                                                $totalOrderLength += $order->qty;
                                                                            @endphp
                                                                        @endforeach
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
                            </div>
                        </div>
                    @else
                        <div class="mt-2 p-3 bg-white">
                            <h5 class="mb-0">
                                No orders yet. <a href="{{ route('front.index') }}">Continue Shopping.</a>
                            </h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function($) {
            "use strict";

            $(".sidebar-toggler").click(function() {
                $(".sidebar, .content").toggleClass("open");
                return false;
            });
        })(jQuery);
    </script>
@endsection
