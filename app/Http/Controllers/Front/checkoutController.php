<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\PlaceOrdermail;
use App\Models\order;
use App\Models\product;
use App\Notifications\InvoicePaid;
use App\Notifications\OrderAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class checkoutController extends Controller
{

    public function index($status)
    {
        $orders =  DB::table('orders as o')
            ->join('products as p', 'p.id', '=', 'o.product_id')
            ->where('o.status', $status)
            ->get([
                'o.id',
                'o.status',

                'o.phone_number',
                'o.address',
                'o.name',
                'p.name as product_name',
                'p.name',
                'p.image',
            ]);

        $statusNames = [1 => 'Pending', 2 => 'ON Delivery', 3 => 'Delivered', 4 => 'Canceled'];
        return view('back.order.index', compact('orders', 'statusNames', 'status'));
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->filled('products')) {
                $orders = [];
                $id = Auth::id();

                foreach ($request->products as $key => $productData) {
                    $order = new order();
                    $order->phone_number = $request->phone_number;
                    $order->address = $request->address ?? "";
                    $order->name = $request->name;
                    $order->quantity = $productData['qty'];
                    $order->product_id = $productData['product_id'];
                    $order->qty = $productData['qty'];
                    $order->rate = $productData['rate'];
                    $order->user_id = $id;
                    $order->option = json_encode($productData['option']);
                    $order->save();

                    $productName = 'Unknown Product';
                    $productImage = 'Not found';
                    $product = product::find($productData['product_id']);
                    if ($product) {
                        $order->productName = $product->name;
                        $order->productImage = $product->image;
                    }
                    $orders[] = $order;
                }

                // Mail::to('testmehere000@gmail.com')->send(new MyEmail());

                // Mail::to('testmehere000@gmail.com')->send(new PlaceOrdermail( $productName, $orderAddress, $orderId, $orders));
                Notification::route('slack', config('notification.slack_invoice_paid'))
                ->notify(new OrderAdded($orders,$productImage));
            }
        } else {
            $products = DB::table('products')->get(['id', 'name']);
            $user = Auth::user();
            if ($user) {
                return view('front.checkout.checkout', compact('products', 'user'));
            }
        }
    }
    public function thankyou()
    {
        $orders = DB::table('orders')->first();
        if ($orders) {
            return view('front.checkout.thankyou', compact('orders'));
        }
    }
}
