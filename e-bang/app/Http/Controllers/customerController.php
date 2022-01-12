<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Buffer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        if(session('auth')){
            return view('Customer.dashboard');
        }else{
            return redirect('/');
        }
    }

    public function order()
    {
        if(session('auth')){
            $user = Auth::where('id_user', session('auth')['id'])->first();
            $buffer = Buffer::where('id_user', $user->id_user)->get();
            $product = Product::get();
            return view('Customer.order', compact('product','buffer'));
        }else{
            return redirect('/');
        }
    }

    public function addCart(Request $request)
    {
        if(session('auth')){
            $user = Auth::where('id_user', session('auth')['id'])->first();

            $buffer = new Buffer();
            $buffer->id_user = $user->id_user;
            $buffer->product_id = $request->prod_id;
            $buffer->save();

            return response()->json(['status' => 'success']);
        }else{
            return redirect('/');
        }
    }

    public function viewCheckout()
    {
        if(session('auth')){
            $user = Auth::where('id_user', session('auth')['id'])->first();
            $buffer = Buffer::where('id_user', $user->id_user)->get();
            return view('Customer.checkout', compact('buffer'));
        }else{
            return redirect('/');
        }
    }

    public function deleteCart($id)
    {
        if(session('auth')){
            Buffer::where('obuffer_id', $id)->delete();
            return redirect('/checkout-product');
        }else{
            return redirect('/');
        }
    }

    public function submitCheckout($id)
    {
        if(session('auth')){
            $buffer = Buffer::where('id_user', $id)->get();
            $order_last = Order::orderBy('order_id', 'desc')->first();
            $order = new Order();
            $order->id_user = $id;
            $noCode = isset($order_last) ? intVal($order_last->order_id) + 1 : 1;
            $order->order_code = 'S-'.date('Ymd').'_0'.$noCode;
            $order->order_date = date('Y-m-d');
            $order->save();

            $total = 0;
            foreach($buffer as $buff){
                $bitem = new OrderItem();
                $bitem->order_id = $order->order_id;
                $bitem->product_id = $buff->product_id;
                $bitem->save();
                $total += $buff->product->product_price;
            }
            $order->order_price = $total;
            $order->save();

            $buffer_del = Buffer::where('id_user', $id)->delete();
            return redirect('/order-customer');
        }else{
            return redirect('/');
        }
    }

    public function salesCust()
    {
        if(session('auth')){
            $user = Auth::where('id_user', session('auth')['id'])->first();
            $order = Order::where('id_user', $user->id_user)->get();
            return view('Customer.sales', compact('order'));
        }else{
            return redirect('/');
        }
    }

    public function salesShow(Request $request)
    {
        if(session('auth')){
            $dataItem = OrderItem::where('order_id', $request->order_id)->get();
            $order = Order::where('order_id', $request->order_id)->first();
            $data = [];
            foreach($dataItem as $item){
                $data[] = [
                    'nama' => $item->product->product_nm,
                    'img' => $item->product->product_img,
                    'harga' => $item->product->product_price,
                    'jenis' => $item->product->product_jns
                ];
            }
            return response()->json(['data' => $data, 'order' => $order]);
        }else{
            return redirect('/');
        }
    }
}
