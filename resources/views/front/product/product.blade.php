@extends('front.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <style>
        .selected-color {
            border: 2px solid #000;
            /* Border to indicate selected color */
            border-radius: 50%;
        }

        .rating-css div {
            color: #FFA800;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        .checked {
            color: #FFA800;
        }




        .wrapper {
            margin: 0 auto;
            max-width: 960px;
            width: 100%;
        }

        .master {

        }

        h1 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        h2 {
            line-height: 160%;
            margin-bottom: 20px;
            text-align: center;
        }

        .rating-component {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rating-component .status-msg {
            margin-bottom: 10px;
            text-align: center;
        }

        .rating-component .status-msg strong {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .rating-component .stars-box {
            -ms-flex-item-align: center;
            align-self: center;
            margin-bottom: 15px;
        }

        .stars-box input {
            display: none;
        }

        .rating-component .stars-box .star {
            color: #ccc;
            cursor: pointer;
        }

        .rating-component .stars-box .star.hover {
            color: #FFA800;
        }

        .rating-component .stars-box .star.selected {
            color: #FFA800;
        }

        .feedback-tags {
            min-height: 119px;
        }

        .feedback-tags .tags-container {
            display: none;
        }

        .feedback-tags .tags-container .question-tag {
            text-align: center;
            margin-bottom: 40px;
        }

        .feedback-tags .tags-box {
            display: -webkit-box;
            display: -ms-flexbox;
            text-align: center;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .feedback-tags .tags-container .make-compliment {
            padding-bottom: 20px;
        }

        .feedback-tags .tag {
            border: 1px solid #FFA800;
            border-radius: 5px;
            color: #FFA800;
            cursor: pointer;
            margin-bottom: 10px;
            margin-left: 10px;
            padding: 10px;
        }

        .feedback-tags .tag.choosed {
            background-color: #FFA800;
            color: #fff;
        }


        .button-box .dones {
            background-color:#FFA800;
            border: 1px solid #FFA800;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            min-width: 100px;
            padding: 10px;
        }



        .submited-box {
            display: none;
            padding: 20px;
        }

        .submited-box .loader,
        .submited-box .success-message {
            display: none;
        }

        .submited-box .loader {
            border: 5px solid transparent;
            border-top: 5px solid #4dc7b7;
            border-bottom: 5px solid #FFA800;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 0.8s linear infinite;
            animation: spin 0.8s linear infinite;
        }

        @-webkit-keyframes compliment {
            1% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            25% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            50% {
                -webkit-transform: rotate(30deg);
                transform: rotate(30deg);
            }

            75% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }

        @keyframes compliment {
            1% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            25% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            50% {
                -webkit-transform: rotate(30deg);
                transform: rotate(30deg);
            }

            75% {
                -webkit-transform: rotate(-30deg);
                transform: rotate(-30deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }



        .dropdown {
            display: inline-block;
            position: relative;
        }

        .dd-button {
            display: inline-block;
            border: 1px solid gray;
            border-radius: 4px;
            padding: 10px 30px 10px 20px;
            background-color: #ffffff;
            cursor: pointer;
            white-space: nowrap;
        }

        .dd-button:after {
            content: '';
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid black;
        }

        .dd-button:hover {
            background-color: #eeeeee;
        }


        .dd-input {
            display: none;
        }

        .dd-menu {
            position: absolute;
            top: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 0;
            margin: 2px 0 0 0;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            list-style-type: none;
        }

        .dd-input+.dd-menu {
            display: none;
        }

        .dd-input:checked+.dd-menu {
            display: block;
        }

        .dd-menu li {
            padding: 5px 10px;
            cursor: pointer;
            white-space: nowrap;
        }

        .dd-menu li:hover {
            background-color: #f6f6f6;
        }

        .dd-menu li a {
            display: block;
            margin: -10px -20px;
            padding: 10px 20px;
            text-decoration: none;

        }
    </style>
@endsection
@section('content')
    <div class="d-none d-md-block">
        <div class="product-main">
            {{-- <div class="page-control">
            </div> --}}
            <div class="main-container">
                <div class="product-main-div">
                    <div class="product-main-div-left">
                        <div id="desktopcarousel" class="carousel slide">
                            <div class="carousel-inner">
                                @php
                                    $sn = 0;
                                @endphp
                                @foreach ($gallerys->where('type', 1) as $gallery)
                                    <div class="carousel-item {{ $sn++ == 0 ? 'active' : '' }}">
                                        <iframe style="width:100%;pointer-events: none;  aspect-ratio: 16 / 9; "
                                            src="{{ $gallery->video_link }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&loop=1&mute=1"
                                            frameborder="0"></iframe>
                                    </div>
                                @endforeach
                                <div class="carousel-item {{ $sn++ == 0 ? 'active' : '' }}">
                                    <img src="{{ vasset($product->image) }}" class="d-block w-100" alt="...">
                                </div>
                                @foreach ($gallerys->where('type', 0) as $gallery)
                                    <div class="carousel-item">
                                        <img src="{{ vasset($gallery->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#desktopcarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#desktopcarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="hover-container">
                            @php
                                $sn = 0;
                            @endphp
                            @foreach ($gallerys->where('type', 1) as $gallery)
                                <div>
                                    <img src="{{ $gallery->image }}" class="image"
                                        onclick="desktopSlide({{ $sn++ }})">
                                </div>
                            @endforeach
                            <div>
                                <img src="{{ vasset($product->image) }}" class="image"
                                    onclick="desktopSlide({{ $sn++ }})">
                            </div>
                            @foreach ($gallerys->where('type', 0) as $gallery)
                                <div>
                                    <img src="{{ vasset($gallery->image) }}" class="image"
                                        onclick="desktopSlide({{ $sn++ }})">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-main-div-right">
                        <span class="product-main-name mb-0">{{ $product->name }}</span>
                        <p class="product-main-description mb-0">{{ $product->short_desc }}</p>
                        <div>
                            <span class="product-main-sale-price" style="color: #FF9F00"> Rs.
                                {{ $product->sale_price }}</span>
                            <span class="product-main-price " style="color: #F85606"> Rs. {{ $product->price }}</span>
                        </div>
                        @php
                            $ratenumber = number_format($rate_value);
                        @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenumber; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenumber + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @if ($rates->count() > 0)
                                <span>{{ $rates->count() }} Ratings</span>
                            @else
                                No Rating
                            @endif
                        </div>
                        <div class="" id="herewilllist">
                        </div>
                        <div class="d-flex btn-groups">
                            <button type="button" class="buy-now-btn me-2"
                                onclick="startOrder('{{ $product->id }}', '{{ $product->option }}')" style="flex: 1">
                                <i class="fas fa-wallet"></i>
                                Buy Now
                            </button>
                            <button type="button" class="add-cart-btn " style="flex:1;"
                                onclick="addToCart({{ $product->id }}, '{{ $product->name }}', 1,  {{ $product->price }},'{{ vasset($product->image) }}')">
                                <i class="fas fa-shopping-cart"></i>
                                add to cart
                            </button>
                            <a target="_blank" type="button" style="flex:1;"
                                href="{{ $product->me_link }}?text={{ urlencode(route('front.share', ['id' => $product->id]) . $product->name) }}"
                                style="text-decoration: none" class="message-btn">
                                <i class="fas fa-brands fa-facebook-messenger"></i>
                                Message
                            </a>
                        </div>
                        <div class="mt-2">
                            {!! $product->long_desc !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block d-md-none">
        <div class="product-featured">
            <div class="showcase-wrapper has-scrollbar">

                <div class="showcase-container">

                    <div class="showcase">
                        <div id="carouselExampleControlsNoTouching" class="carousel slide">
                            <div class="carousel-inner">

                                @php
                                    $sn = 0;
                                @endphp
                                @foreach ($gallerys->where('type', 1) as $gallery)
                                    <div class="carousel-item {{ $sn++ == 0 ? 'active' : '' }}">
                                        <iframe style="width:100%;pointer-events: none;  aspect-ratio: 16 / 9; "
                                            src="{{ $gallery->video_link }}?rel=0?version=3&autoplay=1&controls=0&&showinfo=0&loop=1&mute=1"
                                            frameborder="0"></iframe>
                                    </div>
                                @endforeach
                                <div class="carousel-item {{ $sn++ == 0 ? 'active' : '' }}">
                                    <img src="{{ vasset($product->image) }}" class="d-block w-100" alt="...">
                                </div>
                                @foreach ($gallerys->where('type', 0) as $gallery)
                                    <div class="carousel-item">
                                        <img src="{{ vasset($gallery->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="showcase-content">
                        <h3 class="showcase-title" style="color:#8549F7;">{{ $product->name }}</h3>

                        <p class="showcase-desc">
                            {{ $product->short_desc }}
                        </p>


                        <div class="price-box">
                            <del style="color:#F85606 ">Rs.{{ $product->price }}</del>
                            <p class="price" style="color: #FF9F00">Rs. {{ $product->sale_price }}</p>

                        </div>
                        <div class="ms-3">
                            <div class="" id="herewilllistformobile">
                            </div>
                        </div>

                    </div>

                    <div class="row m-0" id="action-container">
                        <div class=" col-6 p-0">
                            <button class="add-cart-btn w-100" style="border-radius: 0px"
                                onclick="addToCart('{{ $product->id }}', '{{ $product->name }}', 1, {{ $product->price }})"
                                style="flex: 1">
                                <i class="fas fa-shopping-cart"></i>Add To Cart</button>

                        </div>
                        <div class=" col-6 p-0">
                            <button class="buy-now w-100" style="border-radius: 0px"
                                onclick=" startOrder('{{ $product->id }}','{{ $product->option }}')"><i
                                    class="fas fa-wallet"></i> Buy
                                Now</button>
                        </div>
                        <div class=" col-12 p-0  mt-2">
                            <a target="_blank"
                                href="{{ $product->me_link }}?text={{ urlencode(route('front.share', ['id' => $product->id]) . '?' . $product->name) }}"
                                style="text-decoration: none" class="w-100">
                                <button class="message-me w-100" style="border-radius: 0px">
                                    <i class="fa-brands fa-facebook-messenger"></i>
                                    Message Us</button>
                            </a>
                        </div>

                    </div>

                    <div class="dddd ms-3">
                        {!! $product->long_desc !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
<br>
    <div class="mt-3 p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        {{-- total review show here --}}
                        <div class="col-12 col-sm-3">
                            <div class="wrapper">
                                <div class="master">
                                    <h2>Total Review</h2>
                                    <p class="point"
                                        style="justify-content: center; text-align: center; display: flex;font-size: 30px; font-weight: 700">
                                        {{ round($rate_value, 2) }}
                                    </p>
                                    <p class="total-star"
                                        style="justify-content: center; text-align: center; display: flex;font-size: 20px;">
                                        @for ($i = 1; $i <= $ratenumber; $i++)
                                            <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for ($j = $ratenumber + 1; $j <= 5; $j++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </p>
                                    <p
                                        class="rate-counts"style="justify-content: center; text-align: center; display: flex;font-size: 16px;">
                                        @if ($rates->count() > 0)
                                            <span>{{ $rates->count() }} Reviews</span>
                                        @else
                                            No Rating
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- total review end here --}}
                        {{-- progress bar start here  --}}
                        <div class="col-12 col-sm-3">
                            <div class="">
                                @php
                                    $averageRating = $rates->avg('stars');
                                @endphp
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $totalRates = $rates->count();
                                            $percentage = $totalRates > 0 ? ($rates->where('stars', $i)->count() / $totalRates) * 100 : 0;
                                        @endphp
                                        <span>{{ $i }} star</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $percentage }}%; background-color: #FFA800;"
                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        {{-- progress bar End here  --}}
                    </div>
                </div>
                {{-- sort by start here --}}
                <div class="col-md-3 col-12 col-sm-3" style="justify-content: end; display: flex;">
                    <div class="">
                        <label class="dropdown">
                            {{-- <div class="dd-button m-2">
                                Sort By
                            </div> --}}
                            <select id="sort_by" onchange="sortRates(this)">
                                <option value="-1">Sort By</option>
                                <option value="3">Newest First</option>
                                <option value="2">Highest Rated</option>
                                <option value="1">Oldest First</option>
                            </select>
                            {{-- <ul class="dd-menu">
                                @php
                                    $selectedSort = isset($_GET['sort']) ? $_GET['sort'] : null;
                                @endphp
                                <li>
                                    <a
                                        href="{{ route('front.product', ['id' => $product->id, 'sort' => 'all', 'checked' => 'true']) }}">
                                        All
                                        @if ($selectedSort === 'all')
                                            <i class="fa fa-check ms-4"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>

                                    <a
                                        href="{{ route('front.product', ['id' => $product->id, 'sort' => 'newest', 'checked' => 'true']) }}">
                                        Newest
                                        @if ($selectedSort === 'newest')
                                            <i class="fa fa-check ms-4"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('front.product', ['id' => $product->id, 'sort' => 'highest_rated', 'checked' => 'true']) }}">
                                        Highest Rated
                                        @if ($selectedSort === 'highest_rated')
                                            <i class="fa fa-check ms-4"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('front.product', ['id' => $product->id, 'sort' => 'new_rates', 'checked' => 'true']) }}">
                                        Old Rated
                                        @if ($selectedSort === 'new_rates')
                                            <i class="fa fa-check ms-4"></i>
                                        @endif
                                    </a>
                                </li>
                            </ul> --}}
                        </label>
                    </div>
                </div>
                {{-- sort by End here --}}
            </div>
        </div>
        <div class="container">
            <hr class="mt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-review" id="rating">
                        {{-- <div ></div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('front.rate.rateproduct') }}" method="POST" style="border:1px solid #FFA800;border-radius:10px;" class="mt-3 p-3" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @csrf
                <div class="row">
                    <div class="col-md-60">
                        <div class="wrapper">
                            <div class="master">
                                <h2>Your Reviews</h2>
                                <div class="rating-component">
                                    <div class="stars-box">
                                        <input type="radio" value="1" name="product_rating" checked
                                            id="rating1">
                                        <i class="star fa fa-star" title="1 star" data-message="Poor"
                                            data-value="1"></i>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <i class="star fa fa-star" title="2 stars" data-message="Too bad"
                                            data-value="2"></i>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <i class="star fa fa-star" title="2 stars" data-message="Too bad"
                                            data-value="3"></i>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <i class="star fa fa-star" title="3 stars" data-message="Average quality"
                                            data-value="4"></i>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <i class="star fa fa-star" title="5 stars" data-message="very good qality"
                                            data-value="5"></i>
                                    </div>
                                </div>
                                <div class="feedback-tags">
                                    <div class="tags-box">
                                        <input type="text" class="tag form-control" name="user"
                                            id="inlineFormInputName" placeholder="please enter your name">
                                        <input type="text" class="tag form-control" name="review"
                                            id="inlineFormInputName" placeholder="please enter your review">
                                        <input type="file" multiple class="tag form-control  me-2" name="image"
                                            id="inlineFormInputName" placeholder="please enter your image"
                                            accept="image/*">
                                    </div>
                                </div>
                                <div class="button-box">
                                    <input type="submit" class="dones btn btn-warning ms-2" value="Add review" />
                                </div>
                                <div class="submited-box">
                                    <div class="loader"></div>
                                    <div class="success-message">
                                        Thank you!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <style>
        .values {

            padding: 5px 15px;
            text-align: center;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid rgb(85, 85, 85);
        }

        .values.color {
            content: "";
            width: 50px;
            height: 30px;
        }

        .values.active {
            border: 2px solid #124aff;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        }
    </style>
 @endsection
@include('front.home.rating')

@section('script')
    @include('front.order.ordermodal')

    <script>
        var _ordersOptions = {};

        document.addEventListener('DOMContentLoaded', function() {
            listOptions('{{ $product->option }}');
        });

        function select(cat, val) {
            _ordersOptions[cat] = val;
            $('.' + cat).removeClass('active');
            $('.' + cat + '_' + val).addClass('active');
        }

        function listOptions(optionJson) {
            try {
                const optionsArrays = optionJson.split('|');
                console.log('Options Arrays:', optionsArrays);

                if (optionsArrays.length > 0) {
                    $('#herewilllist').append('<hr>');
                    $('#herewilllistformobile').append('<hr>');
                }

                optionsArrays.forEach(option => {
                        const [category, values] = option.split(':');
                        console.log('Category:', category);
                        console.log('Values:', values);

                        const html = `<div style="overflow:auto;margin-bottom:5px;" class="option-container">
                <strong>${category}</strong> <br>
                <div class="d-flex ">
                    ${
                        values.split(',').map((value,index)=>{
                            if(index==0){
                                _ordersOptions[category]=value;
                            }
                            if(category.toLowerCase()=='color'){
                                return ` <div class ="${category} values ${index==0?'active':''} color ${category}_${value}" style = "background-color:${value};"id = "${category}_${value}"onclick = "select('${category}','${value}')"> </div>`
                } else {
                    return `<div class="${category} values ${index==0?'active':''} ${category}_${value}" id="${category}_${value}" onclick="select('${category}','${value}')">${value}</div>`
                }
            }).join('')
    } </div> </div> `;

        $('#herewilllist').append(html);
        $('#herewilllistformobile').append(html);
        });
        }
        catch (error) {
            console.error('Error parsing options:', error);
        }
        }

        function createOptions(value, text) {
            const options = document.createElement('option');
            options.value = value;
            options.text = text;
            return options;
        }



        $gallerys = {!! json_encode($gallerys) !!}

        function desktopSlide(index) {
            $('#desktopcarousel').carousel(index);
        }
        document.addEventListener('DOMContentLoaded', () => {
            const allHoverImages = document.querySelectorAll('.hover-container div img');
            const imgContainer = document.querySelector('.img-container');

            allHoverImages[0].parentElement.classList.add('active');

            document.querySelector('.hover-container').addEventListener('click', (event) => {
                const clickedImage = event.target.closest('img');

                if (clickedImage) {
                    imgContainer.querySelector('img').src = clickedImage.src;
                    resetActiveImg();
                    clickedImage.parentElement.classList.add('active');
                }
            });

            function resetActiveImg() {
                allHoverImages.forEach((img) => {
                    img.parentElement.classList.remove('active');
                });
            }
        });


        document.addEventListener('DOMContentLoaded', () => {
            const allHoverContainers = document.querySelectorAll('.hover-containers div img');
            const showCaseBanner = document.querySelector('.showcase-banner');

            allHoverContainers[0].parentElement.classList.add('active');

            document.querySelector('.hover-containers').addEventListener('click', (event) => {
                const clickedImage = event.target.closest('img');

                if (clickedImage) {
                    showCaseBanner.querySelector('img').src = clickedImage.src;
                    resetActiveImg();
                    clickedImage.parentElement.classList.add('active');
                }
            });

            function resetActiveImg() {
                allHoverContainers.forEach((img) => {
                    img.parentElement.classList.remove('active');
                });
            }
        });

        // using cart to product
        function addToCart(product_id, productName, qty, price, image) {
            let options = {
                image: image,
                options: _ordersOptions,
            };


            CART.addproduct(product_id, productName, qty, price, options);
            console.log(CART.products);
            CART.updateMiniCart();
            CART.updateCartMobile();
        }
    </script>
    <script>
        $(".rating-component .star").on("click", function() {
            var onStar = parseInt($(this).data("value"), 10);
            var radioId = "rating" + onStar;

            // Set the corresponding radio button as checked
            $("#" + radioId).prop("checked", true);

            $(this).parent().children("i.star").each(function(e) {
                if (e < onStar) {
                    $(this).addClass("hover");
                } else {
                    $(this).removeClass("hover");
                }
            });
        }).on("mouseout", function() {
            $(this).parent().children("i.star").each(function(e) {
                $(this).removeClass("hover");
            });
        });

        $(".rating-component .stars-box .star").on("click", function() {
            var onStar = parseInt($(this).data("value"), 10);
            var stars = $(this).parent().children("i.star");
            var ratingMessage = $(this).data("message");

            var msg = onStar.toString();
            $('.rating-component .starrate .ratevalue').val(msg);

            // Set the corresponding radio button as checked
            $("#rating" + onStar).prop("checked", true);

            $(".fa-smile-wink").show();
            $(".button-box .done").show();

            if (onStar === 5) {
                $(".button-box .done").removeAttr("disabled");
            }


            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass("selected");
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass("selected");
            }

            $(".status-msg .rating_msg").val(ratingMessage);
            $(".status-msg").html(ratingMessage);
            $("[data-tag-set]").hide();
            $("[data-tag-set=" + onStar + "]").show();
        });

        // $(".feedback-tags").on("click", function() {
        //     var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
        //     choosedTagsLength = choosedTagsLength + 1;

        //     if ($(this).hasClass("choosed")) {
        //         $(this).removeClass("choosed");
        //         choosedTagsLength = choosedTagsLength - 2;
        //     } else {
        //         $(this).addClass("choosed");
        //         $(".button-box .done").removeAttr("disabled");
        //     }

        //     console.log(choosedTagsLength);

        //     if (choosedTagsLength <= 0) {
        //      }
        // });

        // $(".compliment-container .fa-smile-wink").on("click", function() {
        //     $(this).fadeOut("slow", function() {
        //         $(".list-of-compliment").fadeIn();
        //     });
        // });

        $(".dones").on("click", function() {
            $(".rating-component").hide();
            // $(".feedback-tags").hide();
            $(".button-box").hide();
            $(".submited-box").show();
            $(".submited-box .loader").show();

            setTimeout(function() {
                $(".submited-box .loader").hide();
                $(".submited-box .success-message").show();
            }, 1500);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.photo').dropify();
            rates=_rates.map(o=>{
                return {...o,created_at:new Date(o.created_at)};
            })

            renderAllRates();
        });



        function sortRates(ele){
            const value=ele.value;
            if(value==1){
                console.log(value);
                    rates.sort((a,b)=>a.created_at-b.created_at);
            }else if(value==2){
                console.log(value);
                    rates.sort((a,b)=>b.stars-a.stars);
            }else if (value==3){
                console.log(value);
                    rates.sort((a,b)=>b.created_at-a.created_at);
            }

            renderAllRates();
        }
        function renderAllRates(){
            console.log(rates);
            $('#rating').html(rates.map((rate, key) => {
                return renderRating(rate, key);
            }));
        }
        var rates=[];
        const _rates = {!! json_encode($rates, JSON_NUMERIC_CHECK) !!};
    </script>
@endsection
