<?php
// on submit login form
Route::post('/login', 'LoginController@auth');
// show login form
Route::get('/login', 'LoginController@login');

// carian pengguna
Route::post('/senarai-pengguna', 'PenggunaController@senarai');
// show form
Route::get('/daftar-pengguna', 'PenggunaController@daftar');
// on submit form
Route::post('/daftar-pengguna', 'PenggunaController@save');
// list pengguna
Route::get('/senarai-pengguna', 'PenggunaController@senarai');
// hapus pengguna
Route::get('/hapus-pengguna/{id}', 'PenggunaController@hapus');
// edit pengguna
Route::get('/edit-pengguna/{id}', 'PenggunaController@edit');

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

Route::get('/next', function() {
    return \App\Models\Utility::nextNo();
});