@extends('back.layout')
@section('linkbar')
    / Product
@endsection
@section('toolbar')
    <a href="{{ route('admin.product.add') }}">Add Product</a>
@endsection
@section('content')
    <div class="shadow mb-5 bg-white">
        <div style="overflow: auto">

        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>Short Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category_ID</th>
                <th>Messanger Link </th>
                <th>Option</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->short_desc }}</td>
                        {{-- <td>{!! $product->long_desc !!}</td> --}}
                        <td>
                            <img src="{{ vasset($product->image) }}" alt="" width="50">
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->me_link }}</td>
                        <td>
                            <div style="word-break: break-all; max-width: 100px;">
                            {{$product->option}}
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.product.del', ['product' => $product->id]) }}" class="btn btn-danger"
                                onclick="return confirm('would you like to delete ')">Delete</a>
                            <a href="{{ route('admin.product.gallery', ['product' => $product->id]) }}"
                                class="btn btn-success">Gallery</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>
@endsection
