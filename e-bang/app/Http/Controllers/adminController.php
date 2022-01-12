<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class adminController extends Controller
{
    private function fetchArrayData($array)
    {
        $param = [];
        if(count($array) > 0) {
            foreach ($array as $key => $value) {
                $param[$value['name']] = $value['value'];
            }
        }

        return $param;
    }

    public function index()
    {
        if(session('auth')){
            return view('Admin.dashboard');
        }else{
            return redirect('/');
        }
    }

    public function customerShow()
    {
        if(session('auth')){
            $datacust = Auth::where('role_user', '2')->get();
            return view('Admin.customer', compact('datacust'));
        }else{
            return redirect('/');
        }
    }

    public function productShow()
    {
        if(session('auth')){
            $dataProd = Product::get();
            return view('Admin.product', compact('dataProd'));
        }else{
            return redirect('/');
        }
    }

    public function addProduct()
    {
        if(session('auth')){
            return view('Admin.add_product');
        }else{
            return redirect('/');
        }
    }

    public function storeProduct(Request $request)
    {
        if(session('auth')){
            $data = $request;
            if($data->hasFile('gmbr_produk')){
                $image = $data->file('gmbr_produk');
                $images = $image->getClientOriginalName();
                $images = time().'_'.$images;
                $images = str_replace(' ', '_', $images);
                $image->move('public/images/produk/', $images);

                $saveProduk = new Product();
                $saveProduk->product_nm = $data->nm_produk;
                $saveProduk->product_jns = $data->jn_produk;
                $saveProduk->product_cat = $data->kt_produk;
                $saveProduk->product_price = $data->hrg_produk;
                $saveProduk->product_img = $images;
                $saveProduk->save();

                $request->session()->flash('success-add', 'Berhasil menambah produk');
                return redirect('/product-admin');
            }else{
                $request->session()->flash('err-img', 'Gambar tidak boleh kosong');
                return redirect('/add-product-admin');
            }
        }else{
            return redirect('/');
        }
    }

    public function detailProduct(Request $request)
    {
        $data = Product::where('product_id', $request->prod_id)->first();
        if($data){
            return response()->json(['status' => 'success', 'product' => $data]);
        }else{
            return response()->json(['status' => 'failed']);
        }
    }

    public function editProduct(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first();
        $product->product_nm = $request->prod_nm;
        $product->product_jns = $request->prod_jn;
        $product->product_cat = $request->prod_cat;
        $product->product_price = $request->prod_price;
        $product->save();

        $image = $request->file('img_produk');
        if($image){
            $images = $image->getClientOriginalName();
            $images = time().'_'.$images;
            $images = str_replace(' ', '_', $images);
            if($images != $request->product_img){
                $image->move('public/images/produk/', $images);
                $product->product_img = $images;
                $product->save();
            }
        }
        return redirect('/product-admin');
    }

    public function deleteProduct($id)
    {
        Product::where('product_id', $id)->delete();
        return redirect('/product-admin');
    }

    public function salesOrder()
    {
        $order = Order::get();
        return view('Admin.sales', compact('order'));
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
