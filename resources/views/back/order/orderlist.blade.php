@extends('back.layout')
@section('linkbar')
    / <a href="{{ route('admin.order.index', ['status'=>1]) }}">Order</a>
    / Order List
@section('content')
    <section class=" gradient-custom">
        <div class="container py-5">
            <div class="row">
                <div class="">
                    <div class="card" style="border-radius: 10px;">

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color:#6F19AA;">Order</p>
                            </div>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($orders as $order)
                                            <div class="col-md-2">

                                                <img src="{{ vasset($order->image) }}" class="img-fluid" alt="Phone">
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Name: {{ $order->name }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Phone: {{ $order->phone_number }}</p>
                                            </div>


                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Quantity: {{ $order->quantity }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Address {{ $order->address }}</p>
                                            </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@endsection
