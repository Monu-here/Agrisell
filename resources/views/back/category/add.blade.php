@extends('back.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection
@section('linkbar')
    /<a href="{{ route('admin.category.index') }}">Category</a>/Add
@endsection
@section('content')
    <div class="car shadow p-3 mb-3 bg-white">
        <div class="card-body">
            <form action="{{ route('admin.category.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2 small">
                        <label for="">Image</label>
                        <input type="file" name="image" id="image" class="form-control photo" accept="image/*" required>
                    </div>
                    <div class="col-md-8 mb-2">
                        <div>
                            <label for="">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="">
                            <label for="">Description</label>
                            <textarea name="des" id="des" cols="x   0" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="py-2 text-end">
                            <button class="btn btn-primary">Add Category</button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
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
