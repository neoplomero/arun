<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Admin routes

Route::get('users', ['as' => 'users', 'uses' => 'UsersController@usersList']);
Route::get('users/view/{id}', ['as' => 'users/view', 'uses' =>'UsersController@view']);
Route::get('users/register', ['as' =>  'users/register', 'uses' => 'UsersController@register']);
Route::post('users/register', ['as' =>  'users/create', 'uses' => 'UsersController@create']);

Route::get('users/account/{id}', ['as' =>  'users/account', 'uses' => 'UsersController@account']);
Route::put('users/account', ['as' =>  'users/update', 'uses' => 'UsersController@update']);


Route::get('customers', ['as' => 'customers', 'uses' => 'CustomersController@customersList']);
Route::post('customers', ['as' => 'customerSearch', 'uses' => 'CustomersController@search']);


Route::get('customers/view/{id}', ['as' => 'customers/view', 'uses' =>'CustomersController@view']);
Route::get('customers/register/', ['as' => 'customers/register', 'uses' =>'CustomersController@register']);
Route::post('customers/register/', ['as' => 'customers/create', 'uses' =>'CustomersController@create']);

Route::get('customers/account/{id}', ['as' => 'customers/account', 'uses' =>'CustomersController@account']);
Route::put('customers/account', ['as' =>  'customers/update', 'uses' => 'CustomersController@update']);



Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@productsList']);
Route::get('products/register', ['as' =>  'products/register', 'uses' => 'ProductsController@register']);
Route::post('products/register', ['as' =>  'products/create', 'uses' => 'ProductsController@create']);
Route::get('products/view/{id}', ['as' => 'products/view', 'uses' =>'ProductsController@view']);
Route::put('products/view', ['as' =>  'products/update', 'uses' => 'ProductsController@update']);



Route::get('login', ['as' => 'access', 'uses' => 'AccountController@access']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

Route::get('account', ['as' => 'profile', 'uses' => 'AccountController@profile']);
Route::get('update-account', ['as' => 'edit', 'uses' => 'AccountController@account']);
Route::put('update', ['as' => 'update', 'uses' => 'AccountController@update']);


Route::get('logout', ['as' =>  'logout', 'uses' => 'AuthController@logout']);



Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('order/{id}', [ 'as' => 'order', 'uses' => 'OrderController@check']);

Route::post('order', [ 'as' => 'order/save', 'uses' => 'OrderController@save']);

Route::get('paid/{id}', [ 'as' => 'order/paid', 'uses' => 'OrderController@paid']);
Route::get('restore/{id}', [ 'as' => 'order/restore', 'uses' => 'OrderController@restore']);

Route::get('report/orders/{id}', [ 'as' => 'report/orders', 'uses' => 'ReportController@ordersByCustomer']);
Route::post('report/orders', [ 'as' => 'report/orders/filter', 'uses' => 'ReportController@ordersByCustomerFilter']);
Route::get('report/sales', [ 'as' => 'report/sales', 'uses' => 'ReportController@sales']);

Route::post('report/sales', [ 'as' => 'report/searchSales', 'uses' => 'ReportController@searchSales']);

Route::get('invoice/{id}', [ 'as' => 'invoice', 'uses' => 'OrderController@pdf']);


Route::get('generate/{id}', [ 'as' => 'generate', 'uses' => 'OrderController@generate']);
Route::get('detail/{id}', [ 'as' => 'detail', 'uses' => 'OrderController@orderDetail']);

Route::post('detail', [ 'as' => 'newDetail', 'uses' => 'OrderController@addDetail']);


Route::get('removeDetail/{id}', [ 'as' => 'removeDetail', 'uses' => 'OrderController@removeDetail']);
Route::put('updateDetail', [ 'as' => 'updateDetail', 'uses' => 'OrderController@updateDetail']);

Route::get('send/{id}', [ 'as' => 'send', 'uses' => 'OrderController@send']);

Route::get('orders/list', [ 'as' => 'orders/list', 'uses' => 'OrderController@orderList']);
Route::post('orders/list', [ 'as' => 'orders/search', 'uses' => 'OrderController@orderListFilter']);

Route::get('orders/print', [ 'as' => 'orders/print', 'uses' => 'OrderController@printSearch']);
Route::post('orders/aspdf', [ 'as' => 'orders/aspdf', 'uses' => 'OrderController@getPdf']);

Route::get('orders/view/{id}', [ 'as' => 'orders/view', 'uses' => 'OrderController@view']);

Route::get('delivery', ['as' => 'delivery', 'uses' => 'DeliveryController@orders']);



Route::get('factory/processing', ['as' => 'factoryOrders', 'uses' => 'FactoryController@processingOrders']);
Route::post('factory/received/search', ['as' => 'factorySearch', 'uses' => 'FactoryController@processingSearch']);

Route::get('factory/send/{id}', ['as' => 'factorySend', 'uses' => 'FactoryController@send']);
Route::get('factory/back/{id}', ['as' => 'factoryBack', 'uses' => 'FactoryController@back']);

Route::get('deliverySend/{id}', ['as' => 'deliverySend', 'uses' => 'DeliveryController@send']);
Route::get('deliveryBack/{id}', ['as' => 'deliveryBack', 'uses' => 'DeliveryController@back']);


Route::get('pdf', ['as' => 'pdf', 'uses' => 'AdminController@pdf']);

Route::get('factory/production', ['as' => 'factory/production', 'uses' => 'FactoryController@productionOrders']);