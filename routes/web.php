<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WebController@index')->name('home');

Route::get('/payment',      'PaymentController@payment')->name('payment');
Route::post('/charge',      'PaymentController@charge')->name('payment.charge');

Auth::routes([
    'register'  => false,     // Registration Routes...
    'verify'    => true,       // Email Verification Routes...
    'reset'     => true,        // Password Reset Routes...
]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/cache','HomeController@cache');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Orders
    Route::get('get-orders', 'OrdersController@getOrders')->name('orders.get');
    Route::resource('orders', 'OrdersController')->except('destroy');

    // Invoices
    Route::get('get-invoices', 'InvoicesController@getInvoices')->name('invoices.get');
    Route::resource('invoices', 'InvoicesController')->except('edit', 'update', 'destroy');

    // Payments
    Route::resource('payments', 'PaymentsController');

    // Websites
    Route::resource('websites', 'WebsitesController');

    // Customers
    Route::resource('customers', 'CustomersController');

});

// Route::fallback(function () {
    //Send to 404 or whatever here.
    // return abort(404);
// });

