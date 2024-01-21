<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Models\product;

class orderController extends Controller
{
    public function index($status)
    {
        // dd($status);

        $orders =  DB::table('orders as o')
            ->join('products as p', 'p.id', '=', 'product_id')
            ->where('o.status', $status)
            ->get([
                'o.id',
                'o.qty',
                'o.phone_number',
                'o.address',
                'o.name as oname',
                'o.created_at',
                'p.name',
                'p.image',
                'o.option',
                'o.disctrict',
                'o.altnumber'
            ]);
        $statusNames = [1 => 'Pending', 2 => 'ON Delivery', 3 => 'Delivered', 4 => 'Canceled'];
        return view('back.order.index', compact('orders', 'statusNames', 'status'));
    }

    public function setStatus($order_id, $status)
    {
        DB::table('orders')->where('id', $order_id)->update(['status' => $status]);
    }

    public function order(Request $request)
    {
        $order = new order();
        $order->product_id = $request->product_id;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->quantity = $request->quantity;
        $order->qty = $request->quantity;
        $order->color = $request->color;
        $order->size = $request->size;
        $order->option = $request->option;
        $order->altnumber = $request->altnumber;
        $order->disctrict = $request->disctrict;


        //  start slack notification
        $product = Product::find($request->product_id);

        if ($product) {
            $productName = $product->name;
            $productImage =  $product->image;
        } else {
            $productName = 'Unknown Product';
            $productImage = 'Not found';
        }

        $order->save();

        $order->productName = $productName;
        $order->productImage = $productImage;

        session(['order' => $order->toArray()]);
        Notification::route('slack', config('notification.slack_invoice_paid'))
            ->notify(new InvoicePaid($order, $productName, $productImage));
    }

    public function orderThankYou()
    {
        $order = session('order');
        if ($order == null) {
            return redirect()->route('front.index');
        }

        $order = (object)$order;
        session(['order' => null]);
        return view('front.order.thankyou', compact('order'));
    }




    public function cancle($order)
    {
        DB::table('orders')->where('id', $order)->delete();
        return redirect()->back();
    }
    public function orderlist($id)
    {
        $orders = DB::table('orders as o')
            ->join('products as p', 'p.id', '=', 'o.product_id')
            ->where('o.id', $id)
            ->get([
                'o.id',
                'o.status',
                'o.quantity',
                'o.phone_number',
                'o.address',
                'p.name',
                'p.image'
            ]);

        return view('back.order.orderlist', compact('orders'));
    }
    public function dashboard()
    {
        $user = Auth::user();
        $orders =  DB::table('orders as o')
            ->join('products as p', 'p.id', '=', 'product_id')
            ->where('user_id', $user->id)
            ->get([
                'o.id',
                'o.status',
                'o.qty',
                'o.phone_number',
                'o.address',
                'p.name',
                'p.image',
            ]);
        $statusNames = [1 => 'Pending', 2 => 'ON Delivery', 3 => 'Delivered', 4 => 'Canceled'];
        $statusColors = [1 => 'warning', 2 => 'primary', 3 => 'success', 4 => 'danger'];

        return view('front.userdashbaord.dashboard', compact('user', 'orders', 'statusColors', 'statusNames'));
    }

    public function setAddress(Request $request)
    {
        DB::table('orders')->where('id', $request->id)->update([$request->type => $request->data]);
    }

    public function add(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $order = new order();
            $order->product_id = $request->product_id;
            $order->name = $request->name;
            $order->phone_number = $request->phone;
            $order->address = $request->address;
            $order->quantity = $request->qty;
            $order->qty = $request->qty;
            $order->status = $request->status;
            $order->save();
        } else {
            $products = DB::table('products')->get(['id', 'name']);
            return view('back.order.add', compact('products'));
        }
    }
}
