@extends('front.layout')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <div class="container" id="thankyou">
        <div class="hero">
            <div class="hero__image">
                <img src="{{ asset('assets/front/image/thankyou_ann.png') }}" alt="" />
            </div>
            <div class="hero__content">

                <div class="title" style="">

                    <span>
                        <div class="summer">
                            {{ $order->name }}
                        </div>
                        <br>
                        @php
                            $thankyou = getthankyouSetting();
                        @endphp
                        @if ($thankyou)
                            {{ $thankyou->thankyou }}
                        @endif
                    </span>
                </div>
                <hr>
                <div class="description">
                    <span>
                        Your Order Id is #{{ $order->id }}.
                    </span> <br>
                    <span>
                        One of Our representative will contact yoou soon.
                    </span>
                    <hr>
                    <p>
                        Having trouble? <a target="_blank"
                            href="https://m.me/{{ config('share.page_id') }}?text={{ urlencode('I am facing some problem 🥺.') }}">Message
                            Us</a>
                    </p>

                </div>
                <a href="{{ route('front.index') }}" style="text-decoration: none; color: white;">
                    <button class="order-back"><i class="fa-solid fa-arrow-left"></i> Continue to Shop</a></button>

                </a>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        // var dt = new Date();
        // var hours = dt.getHours();
        // var minutes = dt.getMinutes();
        // var seconds = dt.getSeconds();
        // document.getElementById('time').innerHTML = ': ' + hours + ':' + minutes + ':' + seconds;
        // document.getElementById('date').innerHTML = dt;
    </script>
@endsection
