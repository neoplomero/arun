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


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('logout', ['as' =>  'logout', 'uses' => 'AuthController@logout']);
Route::get('login', ['as' => 'access', 'uses' => 'AccountController@access']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('view/invoice/{id}', ['as' => 'view/invoice', 'uses' => 'GuestController@invoice']);


Route::group(['before' => 'auth'], function () {
Route::group(['before' => 'is_enabled'], function() {
	//Account Routes
	Route::get('account', ['as' => 'profile', 'uses' => 'AccountController@profile']);
	Route::get('update-account', ['as' => 'edit', 'uses' => 'AccountController@account']);
	Route::put('update', ['as' => 'update', 'uses' => 'AccountController@update']);

	//Delivery routes
	Route::group(['before' => 'is_delivery'], function() {
		Route::get('delivery', ['as' => 'delivery', 'uses' => 'DeliveryController@orders']);
		Route::get('deliverySend/{id}', ['as' => 'deliverySend', 'uses' => 'DeliveryController@send']);
		Route::get('deliveryBack/{id}', ['as' => 'deliveryBack', 'uses' => 'DeliveryController@back']);
		Route::post('delivery', ['as' => 'deliverySearch', 'uses' => 'DeliveryController@search']);

	});

	//baker routes
	Route::group(['before' => 'is_baker'], function() {
		Route::get('factory/processing', ['as' => 'factoryOrders', 'uses' => 'FactoryController@processingOrders']);
		Route::get('factory/view/{id}', ['as' => 'factory/view', 'uses' => 'FactoryController@view']);
		Route::post('factory/received/search', ['as' => 'factorySearch', 'uses' => 'FactoryController@processingSearch']);
		Route::get('factory/send/{id}', ['as' => 'factorySend', 'uses' => 'FactoryController@send']);
		Route::get('factory/back/{id}', ['as' => 'factoryBack', 'uses' => 'FactoryController@back']);
		Route::get('factory/production', ['as' => 'factory/production', 'uses' => 'FactoryController@productionOrders']);
	});

	//Seller routes
	Route::group(['before' => 'is_seller'], function() {

		//Customer routes
		Route::get('customers', ['as' => 'customers', 'uses' => 'CustomersController@customersList']);
		Route::post('customers', ['as' => 'customerSearch', 'uses' => 'CustomersController@search']);
		Route::get('customers/view/{id}', ['as' => 'customers/view', 'uses' =>'CustomersController@view']);
		Route::get('customers/register/', ['as' => 'customers/register', 'uses' =>'CustomersController@register']);
		Route::post('customers/register/', ['as' => 'customers/create', 'uses' =>'CustomersController@create']);
		Route::get('customers/account/{id}', ['as' => 'customers/account', 'uses' =>'CustomersController@account']);
		Route::put('customers/account', ['as' =>  'customers/update', 'uses' => 'CustomersController@update']);

		//Orders Routes
		Route::get('order/{id}', [ 'as' => 'order', 'uses' => 'OrderController@check']);
		Route::post('order', [ 'as' => 'order/save', 'uses' => 'OrderController@save']);
		Route::get('paid/{id}', [ 'as' => 'order/paid', 'uses' => 'OrderController@paid']);
		Route::get('restore/{id}', [ 'as' => 'order/restore', 'uses' => 'OrderController@restore']);
		Route::get('generate/{id}', [ 'as' => 'generate', 'uses' => 'OrderController@generate']);
		Route::get('detail/{id}', [ 'as' => 'detail', 'uses' => 'OrderController@orderDetail']);
		Route::post('detail', [ 'as' => 'newDetail', 'uses' => 'OrderController@addDetail']);
		Route::get('removeDetail/{id}', [ 'as' => 'removeDetail', 'uses' => 'OrderController@removeDetail']);
		Route::put('updateDetail', [ 'as' => 'updateDetail', 'uses' => 'OrderController@updateDetail']);
		Route::get('orders/list', [ 'as' => 'orders/list', 'uses' => 'OrderController@orderList']);
		Route::post('orders/list', [ 'as' => 'orders/search', 'uses' => 'OrderController@orderListFilter']);
		Route::get('orders/print', [ 'as' => 'orders/print', 'uses' => 'OrderController@printSearch']);
		Route::post('orders/aspdf', [ 'as' => 'orders/aspdf', 'uses' => 'OrderController@getPdf']);
		Route::get('orders/view/{id}', [ 'as' => 'orders/view', 'uses' => 'OrderController@view']);
		Route::get('invoice/{id}', [ 'as' => 'invoice', 'uses' => 'OrderController@pdf']);
		Route::get('send/{id}', [ 'as' => 'send', 'uses' => 'OrderController@send']);
		Route::get('sendInvoice/{id}&{customerEmail}', [ 'as' => 'sendInvoice', 'uses' => 'OrderController@sendByEmail']);
		Route::put('orders/addNumber', [ 'as' => 'addNumber', 'uses' => 'OrderController@addNumber']);
		Route::put('updateOrder', [ 'as' => 'updateOrder', 'uses' => 'OrderController@update']);


		//Model orders routes
		Route::post('standing/createModel', [ 'as' => 'standing/createModel', 'uses' => 'StandingOrdersController@createModel']);
		Route::get('models', [ 'as' => 'models', 'uses' => 'StandingOrdersController@models']);
		Route::post('standing/create', [ 'as' => 'standing/create', 'uses' => 'StandingOrdersController@createStanding']);
		Route::get('standing/list', [ 'as' => 'standing/list', 'uses' => 'StandingOrdersController@standingList']);

	});

	Route::group(['before' => 'is_admin'], function() {

	//Users routes
	Route::get('users', ['as' => 'users', 'uses' => 'UsersController@usersList']);
	Route::get('users/view/{id}', ['as' => 'users/view', 'uses' =>'UsersController@view']);
	Route::get('users/register', ['as' =>  'users/register', 'uses' => 'UsersController@register']);
	Route::post('users/register', ['as' =>  'users/create', 'uses' => 'UsersController@create']);
	Route::get('users/account/{id}', ['as' =>  'users/account', 'uses' => 'UsersController@account']);
	Route::put('users/account', ['as' =>  'users/update', 'uses' => 'UsersController@update']);

	//Products
	Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@productsList']);
	Route::get('products/register', ['as' =>  'products/register', 'uses' => 'ProductsController@register']);
	Route::post('products/register', ['as' =>  'products/create', 'uses' => 'ProductsController@create']);
	Route::get('products/view/{id}', ['as' => 'products/view', 'uses' =>'ProductsController@view']);
	Route::put('products/view', ['as' =>  'products/update', 'uses' => 'ProductsController@update']);

	//Report routes
	Route::get('report/orders/{id}', [ 'as' => 'report/orders', 'uses' => 'ReportController@ordersByCustomer']);
	Route::post('report/orders', [ 'as' => 'report/orders/filter', 'uses' => 'ReportController@ordersByCustomerFilter']);
	
	Route::get('report/sales', [ 'as' => 'report/sales', 'uses' => 'ReportController@sales']);
	Route::post('report/sales', [ 'as' => 'report/searchSales', 'uses' => 'ReportController@searchSales']);


	Route::get('report/products', [ 'as' => 'report/products', 'uses' => 'ReportController@single_product']);
	Route::post('report/products', [ 'as' => 'report/productSales', 'uses' => 'ReportController@salesByProduct']);

	Route::get('report/products/compare', [ 'as' => 'report/products/compare', 'uses' => 'ReportController@products']);
	Route::post('report/products/compare', [ 'as' => 'report/sellProducts', 'uses' => 'ReportController@sellProducts']);

	Route::get('report/generate', [ 'as' => 'report/generate', 'uses' => 'ReportController@generate']);
	Route::post('report/generate/save', [ 'as' => 'report/generate/save', 'uses' => 'ReportController@Save']);
	Route::get('report/generate/print/{from}&{to}&{id}', [ 'as' => 'report/generate/print', 'uses' => 'ReportController@printOrders']);

	Route::get('report/generate/confirm/{id}', ['as' => 'report/generate/confirm', 'uses' => 'ReportController@confirm']);
	Route::get('report/generate/delete/{id}', ['as' => 'report/generate/delete', 'uses' => 'ReportController@delete']);

	Route::get('report/devolutions', ['as' => 'report/devolutions', 'uses' => 'ReportController@devolutions']);
	Route::post('report/devolutions', ['as' => 'report/devolutionsByDate', 'uses' => 'ReportController@devolutionsByDate']);

	Route::get('devolutions/{id}', [ 'as' => 'devolutions', 'uses' => 'ReportController@customerDevolutions']);

	});


});
});
Route::get('pdf', ['as' => 'pdf', 'uses' => 'AdminController@pdf']);

