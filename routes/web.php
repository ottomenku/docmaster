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
//Auth::routes();
Route::get('/html', function() {

 return Html::mk();

});

Route::get('kiir', function () {
//$generator= Faker\Factory::create();;
// return $generator->realText(10);
return Request::root();
});
//előbb kell lennie mint az alap routok, különben az middleware nem váltja át az adatbázist, az alapconfig él
 Route::domain('test.localhost')->middleware('testsetup')->group(function () {
//Route::group(['domain' => 'test.localhost:8000', 'middleware' => ['testsetup']], function () {
      Route::get('testlogin', function () {
        Auth::logout();
        return redirect('/login');
        }); 
        Route::get('truncate', function () {
          if(config('database.default')=='mysqltest'){
            foreach(config('motest.dusk.truncate') as $table){
              DB::table($table)->truncate();
            }  
            return '<div dusk="truncated"> truncated </div>';
          }
          else{return '<div> not  truncated  </div>';}   
          }); 
     include 'base.php';
   });

Route::any('/test/barionprepare', 'BarionTestController@prepareBarionTest');
Route::any('/test/storetest', 'BarionTestController@storeTest');
Route::any('/test/barionredirect', 'BarionTestController@barionredirectTest');
Route::any('/test/barioncallback', 'BarionTestController@barioncallbackTest');
include 'base.php';


//Route::domain('test.localhost:8000')->group(function ($router) {
 
 // Route::domain('localhost')->middleware('localization')->group(function () {



//});
/*
Route::group(['prefix' => 'test','middleware' => ['testsetup']], function () {
 // config(['database.default' => 'mysql']); 
//config(['database.default' => 'mysqltest']);
 Route::get('dbup', function () {
  \Artisan::call('migrate');
  \Artisan::call('db:seed'); // Artisan::call('db:seed', array('--class' => 'YourSeederClass'));
});


  include 'base.php';
 }); 
**/






