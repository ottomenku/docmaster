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
/*
Route::get('/', function () {
    return view('cristal/index');
});
*/
Route::any('/messagetest', 'BarionController@messagetest');
Route::any('/errortest', 'BarionController@errortest');

//fizetési adatok form megjelenítése html válasz
Route::any('/billingdataform/{orders_id}', 'BarionController@billingdataform')->name('billingdataform'); 
//fizetési adatok form megjelenítése Json válasz
Route::any('/billingdataformJson/{orders_id}', 'BarionController@billingdataformJson')->name('billingdataformJson');

Route::post('/pay', 'BarionController@store')->name('pay')  ;
Route::any('/barionredirect', 'BarionController@redirect') ;
Route::any('/barioncallback', 'BarionController@callback') ;

Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cat/{id}', 'HomeController@category')->name('cat');
//Route::get('/download/{id}', 'HomeController@download');
Route::any('/download/{id}', 'HomeController@download');
Route::any('/directdownload/{id}', 'HomeController@directdownload');
// Check role in route middleware
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'superadmin'], function () {
    
    Route::resource('/pages', 'Admin\PagesController');
    Route::resource('/permissions', 'Admin\PermissionsController');
    Route::resource('/roles', 'Admin\RolesController');
    Route::resource('/settings', 'Admin\SettingsController');
    Route::get('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('/category', 'Admin\\CategoryController');
    Route::resource('/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy']);

 });

 //Route::get('admin', 'Admin\AdminController@index');

Route::group([ 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
    Route::get('/', ['uses' => 'Admin\\AdminController@index']);
    Route::resource('/roletimes', 'Admin\\RoletimesController');
    Route::resource('/users', 'Admin\\UsersController');
    Route::resource('/doc', 'Admin\\DocController');
//Route::post('/upload-image',['as'=>'image.upload','uses'=>'Admin\\DocController@uploadImages']);
    Route::post('/upload-image',['as'=>'image.upload','uses'=>'Admin\\DocController@store']);
    Route::post('/prewupload','Admin\\DocController@prewupload')->name('prewupload');
   // Route::get('/convert','FileController@convert');
   // Route::get('/upload-image','FileController@index');
   Route::resource('/pays', 'PaysController');
   Route::resource('/customers', 'CustomersController');
});





Route::resource('pays', 'PaysController');
Route::resource('customers', 'CustomersController');