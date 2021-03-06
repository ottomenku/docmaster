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
Auth::routes();
Route::get('/', 'HomeController@index');
//testing

Route::any('/messagetest', 'BarionController@messagetest');
Route::any('/errortest', 'BarionController@errortest');
Route::any('/bckiir/{id}', 'BarionController@bckiir');

//fizetési adatok form megjelenítése Json válasz
Route::any('/billingdataformJson/{orders_id}', 'BarionController@billingdataformJson')->name('billingdataformJson');

Route::post('/pay', 'BarionController@store')->name('pay');
Route::any('/barionredirect', 'BarionController@barionredirect');
//Route::any('/barioncallback', 'BarionController@barioncallback')->middleware(['cors']);
Route::any('/barioncallback', 'BarionController@barioncallback');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cat/{id}', 'HomeController@category')->name('cat');
Route::any('/download/{id}', 'HomeController@download');
Route::any('/directdownload/{id}', 'HomeController@directdownload');
Route::get('/howtoprev/{id}', 'HomeController@howtoprev');
Route::get('/docprev/{id}', 'HomeController@docprev');
Route::any('/regmodal', 'HomeController@regmodal');
Route::any('/loginmodal', 'HomeController@loginmodal');
// Check role in route middleware
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'superadmin'], function () {

    Route::resource('/pages', 'Admin\PagesController');
    Route::resource('/permissions', 'Admin\PermissionsController');
    Route::resource('/roles', 'Admin\RolesController');
    Route::resource('/settings', 'Admin\SettingsController');
    Route::get('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('/category', 'Admin\\CategoryController');
    Route::resource('/activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy']);
     Route::resource('/postcat', 'Admin\\PostcatController');   
     Route::resource('/usersfull', 'Admin\\UsersController');
     Route::resource('/pays', 'Admin\\PayController');
      Route::resource('/roletimes', 'Admin\\RoletimesController');
 Route::resource('billingdata', 'Admin\\BillingdataController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
  
    Route::get('/', ['uses' => 'Admin\\AdminController@index']);

    Route::get('billingdata/modalshow/{id}', 'Admin\\BillingdataController@modalshow');
     Route::resource('billingdata', 'Admin\\BillingdataController')->only([
        'index', 'show']);  
     Route::resource('/roletimes', 'Admin\\RoletimesController')->only([
        'index', 'show']);
      Route::resource('/pays', 'Admin\\PayController')->only([
        'index', 'show']);
    Route::resource('/users', 'Admin\\UsersController')->only([
        'index', 'show']);

    Route::resource('/category', 'Admin\\CategoryController');
    Route::resource('/doc', 'Admin\\DocController');
  //  Route::get('/docprev/{id}', 'Admin\\DocController@prev'); //előnézet kivéve az admin mappából
    Route::get('/doc/createwithcat/{id}', 'Admin\\DocController@createWithCat');
    Route::post('/upload-image', ['as' => 'image.upload', 'uses' => 'Admin\\DocController@store']);
    Route::post('/prewupload', 'Admin\\DocController@prewupload')->name('prewupload');
 
    Route::resource('/howcat', 'Admin\\HowcatsController');
    Route::resource('/howto', 'Admin\\HowtoController');
 //   Route::get('/howtoprev/{id}', 'Admin\\howtoController@prev');
    Route::get('/howto/createwithcat/{id}', 'Admin\\howtoController@createWithCat');
    Route::post('/howtoupload', ['as' => 'howto.upload', 'uses' => 'Admin\\howtoController@store']);
   Route::post('/howtoprewupload', 'Admin\\howtoController@prewupload')->name('howtoprewupload');


Route::resource('post', 'Admin\\PostController');
Route::resource('textbase', 'Admin\\TextbaseController');

    Route::resource('/customers', 'CustomersController');
});





