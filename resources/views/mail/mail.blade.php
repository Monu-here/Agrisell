<!DOCTYPE html>
<html>

<head>
    <title>Your Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @php
        $grandTotal = 0;
    @endphp
    <p>Thank you for shopping with us!</p>
    Dear {{ $orderName }},
    <br>
    Warm Regards,
    <br><br>
    Thank you for trusting us! We are thrilled to confirm that your order has been received and is being processed.
    Here are the details of your order:
    <br><br>
    Order details are listed in the tables below:
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order By</th>
                            <th>Shipping Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $orderName }}</td>
                            <td>{{ $orderAddress }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $orderData)
                            <tr>
                                <td>#{{ $orderData['order']->id }}</td>
                                <td>{{ $orderData['productName'] }}</td>
                                <td><img src="{{ asset($orderData['productImage']) }}" alt="" srcset=""
                                        width="50" height="50"></td>
                                <td>{{ $orderData['order']->quantity }}</td>
                                <td>{{ $orderData['order']->rate }}</td>
                                <td>{{ $orderData['order']->rate * $orderData['order']->quantity }}</td>
                            </tr>
                            @php
                                $productTotal = $orderData['order']->rate * $orderData['order']->quantity;
                                $grandTotal += $productTotal;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="5">Grand Total:</td>
                            <td>{{ $grandTotal }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    Thank you again for your support. Happy shopping!
    <br><br>
</body>

</html>
