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
// static function
// get() - terima 2 parameter. param 1 = pattern URL, param 2 = function to exec
// http://lara6.test/hello
Route::get('/hello', function() {
    echo "Hello World";
}); 

// NamaController@nama-function
Route::get('/welcome', 'PageController@home');


// URL , match kan dgn controller
Route::get('/', function () {
    return view('welcome');
});
