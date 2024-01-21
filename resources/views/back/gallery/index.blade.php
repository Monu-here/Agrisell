@extends('back.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>


    </style>
@endsection
@section('linkbar')
    / <a href="{{ route('admin.product.index') }}">Products</a>
    / {{ $product->name }}
    / Gallery
@endsection
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="shadow mb-5 p-3">
                <form action="{{ route('admin.gallery.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="0">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-md-12 small">
                            <label for="media">Media</label>
                            <select name="type" id="media" class="form-control">
                                <option value="">select gallery img/video</option>
                                <option value="0">Image</option>
                                <option value="1">Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3" id="imageUpload">
                        <div class="col-md-12 small">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control photo" accept="image/*">
                        </div>
                    </div>
                    <div class="row mt-3" id="videoUrl" style="display: none;">
                        <div class="col-md-12 small">
                            <label for="video_link">Video URL</label>
                            <input type="text" name="video_link" id="video_link" class="form-control">
                        </div>
                    </div>
                    <div class="py-2 text-end">
                        <button class="btn btn-primary">Add Gallery</button>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($gallerys as $gallery)
                    <div class="col-md-3 mb-3">
                        <div class="shadow">
                            <a href="{{ route('admin.gallery.del', ['gallery' => $gallery->id]) }}" class="delete-btn"
                                onclick="return prompt('Enter Yes to delete data')"><i class="fa-solid fa-trash"></i></a>

                            @if ($gallery->type == 0)
                                <img loading="lazy" src="{{ vasset($gallery->image) }}" alt="Gallery Image"
                                    class="img-fluid">
                            @elseif ($gallery->type == 1)
                                <img loading="lazy" src="{{ $gallery->image }}" alt="YouTube Thumbnail"
                                    class="img-fluid">
                            @endif
                            <hr class="my-1">
                            <a href="{{route('admin.gallery.del',['gallery'=>$gallery->id])}}" class="btn btn-danger w-100" style="border-radius: 0px;">Del</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    {{-- @foreach ($gallerys as $gallery)
        <div class="col-md-3 mb-3">
            <div class="shadow">
                <a href="{{ route('admin.gallery.del', ['gallery' => $gallery->id]) }}" class="delete-btn"
                    onclick="return prompt('Enter Yes to delete data')"><i class="fa-solid fa-trash"></i></a>

                @if ($gallery->type == 0)
                    <img loading="lazy" src="{{ vasset($gallery->image) }}" alt="Gallery Image" class="img-fluid">
                @elseif ($gallery->type == 1)
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $gallery->video_link }}"
                        frameborder="0" allowfullscreen></iframe>
                    <p>Video URL: {{ $gallery->video_link }}</p>
                @endif
            </div>
        </div>
    @endforeach --}}
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.photo').dropify();

            $('#media').on('change', function() {
                if ($(this).val() == 0) {
                    $('#imageUpload').show();
                    $('#videoUrl').hide();
                } else if ($(this).val() == 1) {
                    $('#imageUpload').hide();
                    $('#videoUrl').show();
                }
            });
        })
    </script>
@endsection
