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
    return view('frontend.pages.index');
});

Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');


// backend

Route::get('/index', function(){
   return view('backend.pages.login');
});

Route::group(['middleware' => 'auth'], function(){
// category
Route::get('/add_category', 'CategoryController@add_category');
Route::get('/all_category', 'CategoryController@all_category');
Route::post('/save_category', 'CategoryController@save_category');
Route::get('/de_active_category/{id}', 'CategoryController@de_active_category');
Route::get('/active_category/{id}', 'CategoryController@active_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::post('/update_category', 'CategoryController@update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');

// Brands
Route::get('/view_brands', 'ManufactureController@view_brands');
Route::post('/save_brands', 'ManufactureController@save_brands');
Route::get('/edit_brand/{id}', 'ManufactureController@edit_brand');
Route::post('/update_brands', 'ManufactureController@update_brands');
Route::get('/delete_brand/{id}', 'ManufactureController@delete_brand');
Route::get('/de_active_brand/{id}', 'ManufactureController@de_active_brand');
Route::get('/active_brand/{id}', 'ManufactureController@active_brand');

// Products
Route::get('/view_products', 'ProductController@view_products');
Route::post('/save_product', 'ProductController@save_product');
Route::get('/de_active_product/{id}', 'ProductController@de_active_product');
Route::get('/active_product/{id}', 'ProductController@active_product');
Route::get('/edit_product/{id}', 'ProductController@edit_product');
Route::post('/update_product', 'ProductController@update_product');
Route::get('/delete_product/{id}', 'ProductController@delete_product');

// Slider
Route::get('/view_sliders', 'SliderController@view_sliders');
Route::post('/save_slider', 'SliderController@save_slider');
Route::get('/de_active_sider/{id}', 'SliderController@de_active_sider');
Route::get('/active_sider/{id}', 'SliderController@active_sider');
Route::get('/edit_sider/{id}', 'SliderController@edit_sider');
Route::post('/update_slider', 'SliderController@update_slider');
Route::get('/delete_sider/{id}', 'SliderController@delete_sider');
Route::get('/delete_sider/{id}', 'SliderController@delete_sider');

// Order Management
Route::get('/order_management', 'OrderController@order_management');
});


// frontend
Route::get('/product_by_category/{id}', 'CategoryController@product_by_category');
Route::get('/product_by_manufacture/{id}', 'CategoryController@product_by_manufacture');
Route::get('/view_products/{id}', 'ProductController@view_products_details');

// cart
Route::post('/add_to_cart', 'CartController@add_to_cart');
Route::get('/show_cart_page', 'CartController@show_cart_page');
Route::get('/delete_cart/{id}', 'CartController@delete_cart');
Route::post('/update_cart', 'CartController@update_cart');

// Checkout
Route::get('/cart_checkout_login', 'CheckoutController@cart_checkout_login');
Route::post('/customer_register', 'CustomerController@customer_register');
Route::get('/checkout_page', 'CustomerController@checkout_page');
Route::get('/customer_logout', 'CustomerController@customer_logout');
Route::post('/customer_login', 'CustomerController@customer_login');
Route::get('/view_product/{id}', 'CustomerController@view_product');

// Shippings
Route::post('/save_shipping_details', 'ShippingController@save_shipping_details');
Route::get('/payment_page', 'ShippingController@payment_page');
Route::post('/order_place', 'ShippingController@order_place');
