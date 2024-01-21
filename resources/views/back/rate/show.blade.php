@extends('back.layout')
@section('linkbar')
    /
    <a href="{{ route('admin.rate.index') }}">Product</a> / Review
@endsection
@section('content')
<h5>Rate & Review</h5>
    <div class="shadow mb-5 bg-white">
        <table id="clienttable" class="table table-bordered">
            <thead>
                <th>User Name</th>
                <th>Review</th>
                <th>Stars</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($rateShow as $rate)
                    <tr>
                        <td>{{ $rate->user }}</td>
                        <td>{{ $rate->review }}</td>
                        <td>
                            ({{$rate->stars}})
                            @for ($i = 1; $i <= $rate->stars; $i++)
                                <i class="fa fa-star" style="color: #FFA800"></i>
                            @endfor
                            @for ($j = $rate->stars + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </td>

                        <td>
                            <a href="{{ route('admin.rate.del', ['rate' => $rate->id]) }}" class="btn btn-danger">Del</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
