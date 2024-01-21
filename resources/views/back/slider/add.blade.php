@extends('back.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('linkbar')
    / <a href="{{ route('admin.slider.index') }}">Sliders</a> / Add
@endsection
@section('content')
    <div class="card shadow p-3 mb-3">
        <div class="card-body">
            <form action="{{ route('admin.slider.add') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col-md-9 mb-2 small">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control photo"
                            required>
                    </div>

                    <div class="col-md-3 mb-2 small">
                        <label for="mobile_image">Mobile Image</label>
                        <input type="file" name="mobile_image" accept="image/*" id="mobile_image"
                            class="form-control photo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="product_id">Product</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option value="-1">Select A Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-2">
                        <label for="">Btn text</label>
                        <input type="text" name="btn_text" id="btn_text" class="form-control" value="Buy Now">
                    </div>
                    <div class="col-md-2">
                        <label for="">Btn Padding</label>
                        <input type="text" name="btn_padding" id="btn_padding" class="form-control" value="8px 50px">
                    </div>
                    <div class="col-md-2">
                        <label for="">Btn Height</label>
                        <input type="text" name="btn_height" id="btn_height" class="form-control" value="80px">
                    </div>
                    <div class="col-md-2">
                        <label for="title">Btn bg color</label>
                        <input type="color" name="btn_bg_color" id="btn_bg_color" class="form-control " value="#8649FF">
                    </div>
                    <div class="col-md-2">
                        <label for="title">Btn Text color</label>
                        <input type="color" name="btn_text_color" id="btn_text_color" class="form-control " value="#ffffff">
                    </div>
                    <div class="col-md-2">
                        <label for="title">Btn border radius</label>
                        <input type="text" name="btn_border_radius" id="btn_border_radius" class="form-control " value="3px">
                    </div>
                    <div class="col-md-2">
                        <label for="title">Btn Position</label>
                        <select name="btn_position" id="btn_position" class="form-control">
                            <option value="left" class="form-control">Left</option>
                            <option value="centre" class="form-control">Center</option>
                            <option value="right" class="form-control">Right</option>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="title">Other Properties</label>
                        <input type="text" name="other" id="other" class="form-control" class="font-size:30px;font-weight:700;">
                    </div> --}}
                    {{-- <div class="col-md-12">
                        <label for="title">link</label>
                        <input type="text" name="link" id="link" class="form-control ">
                    </div> --}}



                </div>

                <div class="py-2 text-end">
                    <button class="btn btn-primary">
                        Add Slider
                    </button>
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".photo").dropify();
        });
    </script>
@endsection
