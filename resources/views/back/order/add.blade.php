@extends('back.layout')
@section('linkbar')
   / <a href="{{route('admin.order.index',['status'=>1])}}">Orders </a>
   / Add New
@endsection
@section('content')

    <div class="shadow p-2 bg-white">
        <form action="" onsubmit="addOrder(this,event)">
            @csrf
            <div class="row">
                <div class="col-md-9 mb-2">
                    <label for="product_id">Product</label>
                    <select type="text" name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Pending</option>
                        <option value="2">On Delivery</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required minlength="3">
                </div>
                <div class="col-md-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required minlength="10" maxlength="10">
                </div>
                <div class="col-md-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="qty">Qty</label>
                    <input type="number" name="qty" id="qty" class="form-control" min="1" required value="1">
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-primary">
                        Save Order
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#product_id').select2();
    });
    var lock=false;

    function addOrder(ele,e){
        e.preventDefault();
        lock=true;
        axios.post(ele.action,new FormData(ele))
        .then((res)=>{
            const status=$('#status').val();
            ele.reset();
            $('#status').val(status).change();
        })
        .catch((err)=>{
            alert('Some error occured');

        })
        .finaly(()=>{
            lock=false;
        });

    }
</script>

@endsection
