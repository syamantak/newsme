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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/customer/list', 'CustomerController@list');
Route::get('/customer/add', 'CustomerController@add');
Route::post('/customer/create', 'CustomerController@create');
Route::get('/customer/edit/{id}', 'CustomerController@edit');
Route::post('/customer/update', 'CustomerController@update');
Route::get('/customer/delete/{id}', 'CustomerController@delete');
Route::get('/customer/search', 'CustomerController@search');

Route::get('/newspaper/list', 'NewspaperController@list');
Route::get('/newspaper/add', 'NewspaperController@add');
Route::post('/newspaper/create', 'NewspaperController@create');
Route::get('/newspaper/edit/{id}', 'NewspaperController@edit');
Route::post('/newspaper/update', 'NewspaperController@update');
Route::get('/newspaper/delete/{id}', 'NewspaperController@delete');
Route::get('/newspaper/search', 'NewspaperController@search');

Route::get('/customernewspaper/list', 'CustomerNewspaperController@list');
Route::get('/customernewspaper/add', 'CustomerNewspaperController@add');
Route::post('/customernewspaper/create', 'CustomerNewspaperController@create');
Route::get('/customernewspaper/edit/{id}', 'CustomerNewspaperController@edit');
Route::post('/customernewspaper/update', 'CustomerNewspaperController@update');
Route::get('/customernewspaper/delete/{id}', 'CustomerNewspaperController@delete');
Route::get('/customernewspaper/search', 'CustomerNewspaperController@search');

Route::get('/magazine/list', 'MagazineController@list');
Route::get('/magazine/add', 'MagazineController@add');
Route::post('/magazine/create', 'MagazineController@create');
Route::get('/magazine/edit/{id}', 'MagazineController@edit');
Route::post('/magazine/update', 'MagazineController@update');
Route::get('/magazine/delete/{id}', 'MagazineController@delete');
Route::get('/magazine/search', 'MagazineController@search');

Route::get('/paperboy/list', 'PaperboyController@list');
Route::get('/paperboy/add', 'PaperboyController@add');
Route::post('/paperboy/create', 'PaperboyController@create');
Route::get('/paperboy/edit/{id}', 'PaperboyController@edit');
Route::post('/paperboy/update', 'PaperboyController@update');
Route::get('/paperboy/delete/{id}', 'PaperboyController@delete');
Route::get('/paperboy/search', 'PaperboyController@search');

Route::get('/blank/list', 'BlankController@list');
Route::get('/blank/add', 'BlankController@add');
Route::post('/blank/create', 'BlankController@create');
Route::get('/blank/edit/{id}', 'BlankController@edit');
Route::post('/blank/update', 'BlankController@update');
Route::get('/blank/delete/{id}', 'BlankController@delete');
Route::get('/blank/search', 'BlankController@search');
Route::get('/blank/search', 'BlankController@search');

Route::get('/bill/list', 'BillController@list');
Route::get('/bill/add', 'BillController@add');
Route::post('/bill/create', 'BillController@create');
Route::get('/bill/edit/{id}', 'BillController@edit');
Route::post('/bill/update', 'BillController@update');
Route::get('/bill/delete/{id}', 'BillController@delete');
Route::get('/bill/search', 'BillController@search');
Route::get('/bill/search', 'BillController@search');

Route::get('/stock/list', 'StockController@list');
Route::get('/stock/add', 'StockController@add');
Route::post('/stock/create', 'StockController@create');
Route::get('/stock/edit/{id}', 'StockController@edit');
Route::post('/stock/update', 'StockController@update');
Route::get('/stock/delete/{id}', 'StockController@delete');
Route::get('/stock/search', 'StockController@search');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
