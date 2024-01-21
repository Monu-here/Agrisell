@extends('back.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('linkbar')
    /Add
@endsection
@section('content')
    <div class="car shadow p-3 mb-3 bg-white">
        <div class="card-body">
            <form action="{{ route('admin.logofooter.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $logofooter?->address }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $logofooter?->email }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone No.</label>
                                <input type="text" name="number" id="number" class="form-control"
                                    value="{{ $logofooter?->number }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="">Facebook</label>
                                <input type="url" name="fblink" id="fblink" class="form-control"
                                    value="{{ $logofooter?->fblink }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="">Youtube</label>
                                <input type="url" name="yotubelink" id="yotubelink" class="form-control"
                                    value="{{ $logofooter?->yotubelink }}" >
                            </div>
                            <div class="col-md-6">
                                <label for="">Instagram</label>
                                <input type="url" name="instalink" id="instalink" class="form-control"
                                    value="{{ $logofooter?->instalink }}" >
                            </div>
                            <div class="col-12">
                                <label for="">Copy Right</label>
                                <textarea name="copyright" id="copyright" cols="30" rows="2" class="form-control" >{{ $logofooter?->copyright }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="">Short Description</label>
                                <textarea name="short_desc" id="short_desc" cols="30" rows="2" class="form-control" >{{ $logofooter?->short_desc }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="">Thankyou Text</label>
                                <textarea name="thankyou" id="thankyou" cols="30" rows="2" class="form-control" >{{ $logofooter?->thankyou }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 small">
                        <label for="logo">Logo</label>
                        @if ($logofooter == null)
                            <input type="file" name="image" id="image" class="form-control photo" accept="image/*"
                                >
                        @else
                            <input type="file" name="image" id="image" class="form-control photo" accept="image/*"
                                data-default-file="{{ asset($logofooter->image) }}">
                        @endif
                        <hr class="m-1">
                        <div class="col-12">
                            <label for="">Logo Text</label>
                            <input type="text" name="logotext" id="logotext" class="form-control"
                                value="{{ $logofooter?->logotext }}">
                        </div>
                        <hr class="m-1 text-end">
                        <button class="btn btn-primary">
                            Save
                        </button>
                        {{-- <a href="{{ route('admin.logofooter.index') }}" class="btn btn-danger">Cancel</a> --}}
                    </div>
                </div>
            </form>
        </div>
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.photo').dropify();
            });
        </script>
    @endsection
