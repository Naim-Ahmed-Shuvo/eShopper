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

});
