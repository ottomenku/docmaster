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

// Check role in route middleware
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'superadmin'], function () {
    
    Route::resource('admin/pages', 'Admin\PagesController');
    Route::resource('admin/permissions', 'Admin\PermissionsController');
    Route::resource('admin/roles', 'Admin\RolesController');
    Route::resource('admin/settings', 'Admin\SettingsController');
    Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('admin/category', 'Admin\\CategoryController');
    Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy']);

 });


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
    Route::get('/', ['uses' => 'AdminController@index']);
    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/roletimes', 'Admin\RoletimesController');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/doc', 'Admin\\DocController');
    Route::post('admin/prewupload','Admin\\DocController@prewupload')->name('prewupload');
    Route::get('admin/convert','FileController@convert');
    Route::get('admin/upload-image','FileController@index');
    Route::post('admin/upload-image',['as'=>'image.upload','uses'=>'FileController@uploadImages']);
});




