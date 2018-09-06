<?php

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
    return view('index');
})->name('home');
Route::get('/admin','Controller@index')->name('adminindex');




// category backend
Route::get('admin/categorylist','CategoryController@index')->name('categorylist');
Route::get('admin/addcategory','CategoryController@addcategory')->name('addcategory');
Route::get('admin/updatecategorystatus/{category_id}','CategoryController@updatecategorystatus')->name('updatecategorystatus');
Route::get('admin/editcategorydata/{category_id}','CategoryController@editcategorydata')->name('editcategorydata');
Route::post('admin/updatecategorydata/{category_id}','CategoryController@updatecategorydata')->name('updatecategorydata');
Route::get('admin/deletecategorydata/{category_id}','CategoryController@deletecategorydata')->name('deletecategorydata');
Route::post('admin/savecategory','CategoryController@savecategory')->name('savecategory');


// category forntend

Route::get('products_by_category/{id}','CategoryController@products_by_category')->name('products_by_category');

//brand backend

Route::get('admin/brandlist','BrandController@index')->name('brandlist');
Route::get('admin/addbrand','BrandController@addbrand')->name('addbrand');
Route::get('admin/updatebrandstatus/{id}','BrandController@updatebrandstatus')->name('updatebrandstatus');
Route::get('admin/editbranddata/{id}','BrandController@editbranddata')->name('editbranddata');
Route::post('admin/updatebranddata/{id}','BrandController@updatebranddata')->name('updatebranddata');
Route::get('admin/deletebranddata/{id}','BrandController@deletebranddata')->name('deletebranddata');
Route::post('admin/savebrand','BrandController@savebrand')->name('savebrand');


//product backend
Route::get('admin/productlist','ProductController@index')->name('productlist');
Route::get('admin/addproduct','ProductController@addproduct')->name('addproduct');
Route::get('admin/updateproductstatus/{id}','ProductController@updateproductstatus')->name('updateproductstatus');
Route::get('admin/deleteproductdata/{id}','ProductController@deleteproductdata')->name('deleteproductdata');
Route::get('admin/editproductdata/{id}','ProductController@editproductdata')->name('editproductdata');
Route::post('admin/saveproduct','ProductController@saveproduct')->name('saveproduct');


//product forntend
Route::get('product_details_by_id/{id}','ProductController@product_details_by_id')->name('product_details_by_id');


// slider backend

Route::get('admin/addslider','SliderController@addslider')->name('addslider');
Route::get('admin/sliderlist','SliderController@sliderlist')->name('sliderlist');
Route::get('admin/editslider/{id}','SliderController@editslider')->name('editslider');
Route::get('admin/deleteslider/{id}','SliderController@deleteslider')->name('deleteslider');
Route::post('admin/saveslider','SliderController@saveslider')->name('saveslider');
Route::post('admin/updateslider/{id}','SliderController@updateslider')->name('updateslider');

//admin backend
Route::post('admin/loginpanel','AdminController@loginpanel')->name('loginpanel');
Route::get('admin/login','AdminController@login')->name('login');
Route::get('admin/logout','AdminController@logout')->name('logout');
Route::get('admin/addadmin','AdminController@addadmin')->name('addadmin');
Route::get('admin/adminlist','AdminController@adminlist')->name('adminlist');
Route::post('admin/saveadmin','AdminController@saveadmin')->name('saveadmin');


// order backedn
Route::get('manage_order','OrderController@manage_order')->name('manage_order');
Route::get('vieworder/{order_id}','OrderController@vieworder')->name('vieworder');
Route::get('getPDF','OrderController@getPDF')->name('getPDF');




//cart forntend
Route::post('add_to_card','CardController@add_to_card')->name('add_to_card');
Route::get('card','CardController@card')->name('card');
Route::post('update_cart','CardController@update_cart')->name('update_cart');
Route::get('delete_cart/{rowId}','CardController@delete_cart')->name('delete_cart');


//customer login register
Route::get('login_register','CustomerController@login_register')->name('login_register');
Route::get('customer_logout','CustomerController@customer_logout')->name('customer_logout');
Route::get('checkout','CustomerController@checkout')->name('checkout');
Route::post('customer_sign_in','CustomerController@customer_sign_in')->name('customer_sign_in');
Route::post('customer_login','CustomerController@customer_login')->name('customer_login');


// shipping 
Route::post('save_shipping','ShippingController@save_shipping')->name('save_shipping');


//payment
Route::get('payment','PaymentController@payment')->name('payment');
Route::post('save_payment_method','PaymentController@select_payment_method')->name('select_payment_method');


//order 

Route::get('success',function(){
	return view('pages.customerorderinvoice');
})->name('ticket');





