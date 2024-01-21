@extends('back.layout')
@section('linkbar')
    / <a href="{{ route('admin.order.index', ['status' => 1]) }}">Orders </a>
    / Add New
@endsection
@section('content')
    @php
        $setting = getOrderSetting();
    @endphp
    <div class="shadow p-2 bg-white">
        <form action="{{ route('admin.setting.add') }}" method="POST">
            @csrf
            <div class="row m-3">
                <div class="col-md-3">
                    <div id="orderSettingConteiner">
                        <label for="name">Name Value</label>
                        @if ($setting)
                            <input type="text" name="name" id="new" class="form-control"
                                placeholder="Enter Name Value " value="{{ $setting->name ?? "" }}">
                        @endif
                    </div>
                    <div id="orderSettingConteiner">
                        <label for="name">Name Placeholder</label>
                        @if ($setting)
                            <input type="text" name="nameplaceholder" id="new" class="form-control"
                                placeholder="Enter Name Placeholder" value="{{ $setting->nameplaceholder ?? ""}}">
                        @endif

                    </div>

                </div>
                <div class="col-md-3">
                    <div id="orderSettingConteiner">
                        <label for="name">Address Value</label></label>
                        @if ($setting)
                            <input type="text" name="address" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->address?? "" }}">
                        @endif

                    </div>
                    <div id="orderSettingConteiner">
                        <label for="name">Address Placeholder</label></label>
                        @if ($setting)
                            <input type="text" name="addressplaceholder" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->addressplaceholder?? "" }}">
                        @endif

                    </div>
                </div>
                <div class="col-md-3">
                    <div id="orderSettingConteiner">
                        <label for="name">Quantity Value</label>
                        @if ($setting)
                            <input type="text" name="qtyy" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->qtyy?? "" }}">
                        @endif

                    </div>
                    <div id="orderSettingConteiner">
                        <label for="name">Quantity Placeholder</label>
                        @if ($setting)
                            <input type="text" name="qtyyplaceholder" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->qtyyplaceholder ?? ""}}">
                        @endif

                    </div>
                </div>
                <div class="col-md-3">
                    <div id="orderSettingConteiner">
                        <label for="name">Number Value </label>
                        @if ($setting)
                            <input type="text" name="number" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->number?? "" }}">
                        @endif


                    </div>
                    <div id="orderSettingConteiner">
                        <label for="name">Number Placeholder </label>
                        @if ($setting)
                            <input type="text" name="numberplaceholder" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->numberplaceholder ?? ""}}">
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="orderSettingConteiner">
                        <label for="name">Button Value</label>
                        @if ($setting)
                            <input type="text" name="btn" id="new" class="form-control"
                                placeholder="Enter Order Setting Name " value="{{ $setting->btn ?? ""}}">
                        @endif


                    </div>
                    <div class="button mt-2">
                        <button class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
        </form>
        {{-- <div class="card shadow ms-4 bg-white">
            <div class="card">
                <div class="card-body">
                    @php
                        $i = 1;
                    @endphp
                    <table class="table table-striped">
                        <tr>
                            <thead>
                                <th>Sn</th>
                                <th>Order Value 1</th>
                                <th>Order value 2</th>
                                <th>Order value 3</th>
                                <th>Order value 4</th>
                            </thead>
                        </tr>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $setting->name }}</td>
                                    <td>{{ $setting->number }}</td>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->qtyy }}</td>
                                    <td>
                                        <a href="{{ route('admin.setting.del', ['setting' => $setting->id]) }}"
                                            class="btn btn-danger">Del</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    @endsection
    @section('scripts')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"
            integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var orderSettingCount = 2;
            $(document).ready(function() {

                // $('#addOrderSetting').on('click', function() {
                //     var orderSettingField = $('#orderSettingConteiner #new:first').clone();
                //     orderSettingField.val('');
                //     orderSettingField.attr('placeholder', 'Enter Order Setting ' + orderSettingCount + ' Name');
                //     $('#orderSettingConteiner').append(orderSettingField);
                //     orderSettingCount++;

                // });
                // $('#addordersettinf').on('click', function() {
                //     addUserField();
                // });
            });
        </script>
    @endsection
