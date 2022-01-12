<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    if(session('auth')){
        if(session('auth')['role'] == '1'){
            return redirect('/dashboard-admin');
        }else{
            return redirect('/dashboard-customer');
        }
    }else{
        return view('login');
    }
});

Route::post('/do-login', '\App\Http\Controllers\indexController@doLogin');
Route::get('/do-logout', '\App\Http\Controllers\indexController@doLogout');
Route::get('/register', '\App\Http\Controllers\indexController@register');
Route::post('/register-customer', '\App\Http\Controllers\indexController@registerCust');
Route::post('/edit-profile', '\App\Http\Controllers\indexController@editProfile');

// Admin
Route::get('/dashboard-admin', '\App\Http\Controllers\adminController@index');
Route::get('/customer-admin', '\App\Http\Controllers\adminController@customerShow');
Route::get('/product-admin', '\App\Http\Controllers\adminController@productShow');
Route::get('/add-product-admin', '\App\Http\Controllers\adminController@addProduct');
Route::post('/store-product-admin', '\App\Http\Controllers\adminController@storeProduct');
Route::post('/product-detail-admin', '\App\Http\Controllers\adminController@detailProduct');
Route::post('/product-edit-admin', '\App\Http\Controllers\adminController@editProduct');
Route::get('/delete-product-admin/{id}', '\App\Http\Controllers\adminController@deleteProduct');
Route::get('/sales-admin', '\App\Http\Controllers\adminController@salesOrder');
Route::post('/show-sales-admin', '\App\Http\Controllers\adminController@salesShow');

// Customer
Route::get('/dashboard-customer', '\App\Http\Controllers\customerController@index');
Route::get('/order-customer', '\App\Http\Controllers\customerController@order');
Route::post('/add-to-cart', '\App\Http\Controllers\customerController@addCart');
Route::get('/checkout-product', '\App\Http\Controllers\customerController@viewCheckout');
Route::get('/delete-cart/{id}', '\App\Http\Controllers\customerController@deleteCart');
Route::get('/submit-checkout/{id}', '\App\Http\Controllers\customerController@submitCheckout');
Route::get('/sales-customer', '\App\Http\Controllers\customerController@salesCust');
Route::post('/show-sales', '\App\Http\Controllers\customerController@salesShow');