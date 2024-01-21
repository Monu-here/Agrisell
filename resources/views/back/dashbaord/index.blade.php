@extends('back.layout')
@section('content')
    <div class="row mt-3">
        <div class="col-md-5">
            <div class="bg-white shadow">

                <h5 class="p-2">Most Ordered Product</h5>
                <hr class="m-0">
                <div class="p-2" style="height: 500px;overflow-y:auto;">
                    @if (count($products) == 0)
                        <h5>No Orders Yet.</h5>
                    @else
                        @foreach ($products as $product)
                            <div class="row m-0">
                                <div class="col-md-2">
                                    <img src="{{ asset($product->image) }}" alt="" class="w-100">
                                </div>
                                <div class="col-md-6">
                                    {{ $product->name }}
                                </div>
                                <div class="col-md-3">{{ $product->count }} Orders</div>
                            </div>
                            <hr class="my-1">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-white shadow">

                <h5 class="p-2">Recent Order</h5>
                <hr class="m-0">
                <div class="p-2" style="height: 500px;overflow-y:auto;">
                    @if (count($orders) == 0)
                        <h5>No Pending Orders available.</h5>
                    @else
                        @foreach ($orders as $order)
                            <div class="row m-0" style="font-weight: 600;">
                                <div class="col-md-2">
                                    <img src="{{ asset($order->image) }}" alt="" class="w-100">
                                </div>
                                <div class="col-md-3">
                                    {{ $order->name }} <br>
                                    X {{ $order->qty }} Pcs.
                                </div>
                                <div class="col-md-5">
                                    {{ $order->uname }} <br>
                                    <a href="tel:{{ $order->phone_number }}">{{ $order->phone_number }}</a>
                                </div>
                                <div class="col-md-2">
                                    {{ getAgo($order->created_at) }}

                                </div>
                            </div>
                            <hr class="my-1">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


