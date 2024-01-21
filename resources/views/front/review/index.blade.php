@extends('front.layout')
@section('css')
@endsection
@section('content')
<form action="{{route('front.review.review')}}" method="POST">
    @csrf
    inousdiusgiudg
    </form>

@endsection
