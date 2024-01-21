@extends('back.layout')
@section('css')

@endsection
@section('css')
    <style>
        .image {
            max-width: 200px;
            overflow-y: hidden;
        }

        .image {
            max-width: 200px;
            overflow-y: hidden;
        }
    </style>
@endsection
@section('linkbar')
    / Sliders
@endsection
@section('toolbar')
    <a href="{{ route('admin.slider.add') }}">Add Slider</a>
@endsection
@section('content')
    <div class="shadow mb-3 bg-white">
        <div style="overflow: auto">

        <table class="table table-bordered" id="clienttable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Mobile Image</th>
                    <th>Product</th>
                    {{-- <th>Btn text</th>
                <th>Btn padding</th>
                <th>Btn height</th>
                <th>Btn bg color</th>
                <th>Btn text color</th>
                <th>Btn border radius</th>
                <th>Btn position</th>
                <th>Btn other</th> --}}
                    {{-- <th>Link</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>
                            <img src="{{ asset($slider->image) }}" alt="" width="70">
                        </td>
                        <td>
                            <img src="{{ asset($slider->mobile_image) }}" alt="" srcset="" width="70">
                        </td>
                        <td>{{ $slider->product ? $slider->product->name : 'No Product' }}</td>
                        {{-- <td>{{ $slider->btn_text }}</td>
                    <td>{{ $slider->btn_padding }}</td>
                    <td>{{ $slider->btn_height }}</td>
                    <td>{{ $slider->btn_bg_color }}</td>
                    <td>{{ $slider->btn_text_color }}</td>
                    <td>{{ $slider->btn_border_radius }}</td>
                    <td>{{ $slider->btn_position }}</td>
                    <td>{{ $slider->other }}</td> --}}
                        {{-- <td>{{ $slider->link }}</td> --}}
                        <td>
                            <a href="{{ route('admin.slider.edit', ['slider' => $slider->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.slider.del', ['slider' => $slider->id]) }}" class="btn btn-danger"
                                onclick="return confirm('Delete')">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>
@endsection
@section('scripts')


@endsection
