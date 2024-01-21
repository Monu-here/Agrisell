@extends('front.layout')
@section('content')
    <section class=" gradient-custom">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius: 10px;">

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color:#6F19AA;">My Order</p>
                            </div>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        @php
                                        $totalOrderLength = 0;
                                        @endphp
                                        @foreach ($orders as $order)
                                            <div class="col-md-1 pb-2">
                                                <img src="{{ vasset($order->image) }}" class="img-fluid" alt="">
                                            </div>
                                            <div
                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Product Name: {{ $order->name }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Phone: {{ $order->phone_number }}</p>
                                            </div>
                                            <div
                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Quantity: {{ $order->quantity }}</p>
                                            </div>
                                            <div
                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Address {{ $order->address }}</p>
                                            </div>
                                            @php
                                            $totalOrderLength += $order->quantity;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <!-- Display the total order length at the end of the section -->
                                    <div class="text-center">
                                        <p class="fw-bold">Total Order Length: {{ $totalOrderLength }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
