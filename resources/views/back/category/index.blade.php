@extends('back.layout')
@section('css')

@endsection
@section('linkbar')
    /Category
@endsection

@section('toolbar')
    <a href="{{ route('admin.category.add') }}">Add Category</a>
@section('content')
    <div class="shadow mb-5 bg-white">
        <table id="clienttable" class="table table-bordered">
            <thead>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <img src="{{ vasset($category->image) }}" alt="" width="50">
                        </td>
                        <td>{{ $category->des }}</td>
                        <td>
                            <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.category.del', ['category' => $category->id]) }}"
                                class="btn btn-danger" onclick="return confirm('would you like to delete')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@endsection
@section('scripts')

@endsection
