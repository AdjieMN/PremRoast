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
    return view('welcome');
});
//Route Admin
Route::get('/item','AdminController@index');
Route::get('/admin/tambah','AdminController@add');
Route::post('/admin/store','AdminController@store');
Route::get('/admin/edit/{idItem}','AdminController@edit');
Route::post('/admin/update','AdminController@update');
Route::get('/admin/hapus/{idItem}','AdminController@delete');
Route::get('/transaksi','AdminController@transaksi');
Route::get('/order/detail/{idTransaksi}','AdminController@detailTransaksi');
Route::get('/order/confirm/{idTransaksi}','AdminController@confirmTransaksi');
Route::get('/order/delete/{idTransaksi}','AdminController@deleteTransaksi');
Route::get('search/item','AdminController@search')->name('post.search/item');

//Route Login
Route::get('/login','LoginController@index');
Route::post('/loginPost','LoginController@loginPost');
Route::get('/register','LoginController@register');
Route::post('/registerPost','LoginController@registerPost');
Route::get('/logout','LoginController@logout');
//Route Dashboard
Route::get('/dashboard','DashController@index');
Route::get('/store','DashController@store');
Route::get('/item/order/{idItem}','DashController@order');
Route::post('/item/addCustomer','DashController@addCustomer');
Route::get('/item/next','DashController@next');
Route::post('/item/addOrder','DashController@addOrder');
Route::get('search/item/dashboard','DashController@search')->name('post.search/item/dashboard');
