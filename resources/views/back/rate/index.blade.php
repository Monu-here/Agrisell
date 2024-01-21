@extends('back.layout')
@section('linkbar')
    /Review
@endsection
@section('content')
    <div>
     <h5>Rate And Review </h5>
    </div>
    <div class="shadow mb-5 bg-white">
        <table id="clienttable" class="table table-bordered">
            <thead>
                <th>Prduct Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($rates->unique('product_id') as $rate)
                    <tr>
                        <td>{{ $rate->product->name }}</td>
                        <td>
                            <a href="{{ route('admin.rate.rate', ['product_id' => $rate->product->id, 'rate' => $rate->id]) }}" class="btn btn-success">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
