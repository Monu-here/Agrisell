@extends('back.layout')

@section('content')
    <div class="shadow p-2 bg-white">
        <h2>Settings Table</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order Settings</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        @foreach ($setting->ordersetting as $orderSetting)
                            <td>{{ $orderSetting }}</td>
                            <td>
                                <a href="{{ route('admin.setting.del', ['setting' => $setting->id]) }}"
                                    class="btn btn-danger">DEl</a>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
