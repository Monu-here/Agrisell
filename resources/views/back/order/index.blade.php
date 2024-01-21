@extends('back.layout')
@section('linkbar')
    / Order
@endsection
@section('toolbar')
    <a href="{{ route('admin.order.add') }}" class="btn btn-primary btn-sm text-white">Add Order</a>
@endsection
@section('content')
    <style>
        th,
        td {
            vertical-align: center;
        }
    </style>
    <div class="shadow p-2 mb-2 d-flex justify-content-between">
        @foreach ($statusNames as $key => $statusName)
            <a class="btn {{ $key == $status ? 'btn-primary' : '' }}"
                href="{{ route('admin.order.index', ['status' => $key]) }}">
                {{ $statusName }}
            </a>
        @endforeach
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div style="overflow: auto">

                <table class="table table-bordered mb-0">
                    <thead>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Qty.</th>
                        <th>

                        </th>
                        <th colspan="2">Action</th>

                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr id="order-{{ $order->id }}">
                                <td>
                                    <img src="{{ vasset($order->image) }}" style="height: 50px;" alt="">
                                </td>
                                <td>
                                    {{ $order->name }}
                                    <hr>
                                    {!! (str_replace(['{', '}', '"'], ' ', $order->option)) !!}

                                </td>
                                <td ondblclick="changeAddress(this,{{ $order->id }},'name')">
                                    {{ $order->oname }}
                                </td>
                                <td ondblclick="changeAddress(this,{{ $order->id }},'phone_number')">
                                    {{ $order->phone_number }}
                                    <hr>
                                    Optional Number:  {{$order->altnumber}}
                                </td>
                                <td ondblclick="changeAddress(this,{{ $order->id }},'address')"
                                    id="address-{{ $order->id }}">
                                    {{ $order->address }}
                                    <hr>
                                    District :  {{$order->disctrict}}
                                </td>


                                <td ondblclick="changeAddress(this,{{ $order->id }},'qty')">
                                    {{ $order->qty }}
                                </td>
                                <td>
                                    {{ getAgo($order->created_at) }}
                                </td>
                                <td>
                                    @if ($status == 1)
                                        <a href="{{ route('admin.order.set.status', ['order_id' => $order->id, 'status' => 2]) }}"
                                            class="btn btn-primary btn-sm"
                                            onclick=" event.preventDefault();if(confirm('Set On Delivery Order')){setStatus(this.href,{{ $order->id }});}">Set
                                            On
                                            Delivery</a>
                                            <br>
                                        <a href="{{ route('admin.order.set.status', ['order_id' => $order->id, 'status' => 4]) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault();if(confirm('Cancel Order')){setStatus(this.href,{{ $order->id }});}">Cancel</a>
                                    @elseif($status == 2)
                                        <a href="{{ route('admin.order.set.status', ['order_id' => $order->id, 'status' => 3]) }}"
                                            class="btn btn-success btn-sm"
                                            onclick="event.preventDefault();if(confirm('Set On Delivered')){setStatus(this.href,{{ $order->id }});}">Set
                                            Delivered</a>
                                    @elseif($status == 3)

                                    @elseif($status == 4)
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.orderlist', ['id' => $order->id]) }}"
                                        class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var locks = [];

        function setStatus(href, id) {
            if (locks.includes(id)) {
                return;
            }
            locks.push(id);

            $.get(href, {},
                function(data, textStatus, jqXHR) {
                    $('#order-' + id).remove();
                    locks = locks.filter(o => o != id);
                },

            ).fail(function(xhr, status, error) {
                locks = locks.filter(o => o != id);
            });
        }

        function changeAddress(ele, id, type) {
            console.log(ele.innerText);
            const oldData = ele.innerText;
            const newData = prompt("Enter New Address", oldData);
            if (oldData != newData && newData != null) {
                $.post("{{ route('admin.order.set.address') }}", {
                        _token: "{{ csrf_token() }}",
                        data: newData,
                        id: id,
                        type
                    },
                    function(data, textStatus, jqXHR) {
                        ele.innerText = newData;
                    },
                );
            }
        }
    </script>
@endsection
