@extends('back.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('linkbar')
    /<a href="{{ route('admin.slider.index') }}">Slider</a> / Edit
@endsection
@section('content')
    <div class="card shadow p-3 mb-3">
        <div class="card-body">
            <form action="{{ route('admin.slider.edit', ['slider' => $slider->id]) }}" method="post"
                enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col-md-9 mb-2 small">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control photo"
                            data-default-file="{{ asset($slider->image) }}">
                    </div>

                    <div class="col-md-3 mb-2 small">
                        <label for="mobile_image">Mobile Image</label>
                        <input type="file" name="mobile_image" accept="image*" id="mobile_image"
                            class="form-control photo" data-default-file="{{ asset($slider->mobile_image) }}">
                    </div>




                    <div class="col-md-12">
                        <label for="">Product</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option value="-1">Select A Product</option>

                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id', $slider->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="py-2 text-end">
                    <button class="btn btn-primary">
                        Update
                    </button>
                    <a href="{{ route('admin.slider.index') }}" class="btn btn-danger">Cancle</a>
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
