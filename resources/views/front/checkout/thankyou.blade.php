@extends('front.layout')
@section('content')
    <style>

    </style>
    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1 class="thanyouh1">Thank you !</h1>
                <p>Thanks {{ $orders->name }} for  your order . </p>
                <p>you should receive a order  email soon </p>

                <div class="text-center">

                    <button class="go-home" >
                        <a href="{{route('front.index')}}">Go home</a>
                    </button>
                    <button class="go-home" >
                        <a href="{{route('front.userdashboard')}}">View Orders</a>
                    </button>
                </div>
            </div>
            {{-- <div class="footer-like">
                <p>Email received .
                    <a href="http://mail.google.com/" target="_blank">Click here to see mail</a>
                </p>
            </div> --}}
        </div>
    </div>
    <br>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
@endsection
