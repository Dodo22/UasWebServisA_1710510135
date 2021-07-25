<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

 
Route::get('/pengunjung', 'PengunjungController@tampil')->middleware('jwt.verify');
Route::get('/pengunjung/{pengunjung}', 'PengunjungController@show')->middleware('jwt.verify');
Route::post('/pengunjung', 'PengunjungController@tambah')->middleware('jwt.verify');
Route::patch('/pengunjung/{pengunjung}', 'PengunjungController@ubah')->middleware('jwt.verify');
Route::delete('/pengunjung/{pengunjung}', 'PengunjungController@hapus')->middleware('jwt.verify');

Route::get('/wisata', 'WisataController@tampil')->middleware('jwt.verify');
Route::get('/wisata/{wisata}', 'WisataController@show')->middleware('jwt.verify');
Route::post('/wisata', 'WisataController@tambah')->middleware('jwt.verify');
Route::patch('/wisata/{wisata}', 'WisataController@ubah')->middleware('jwt.verify');
Route::delete('/wisata/{wisata}', 'WisataController@hapus')->middleware('jwt.verify');






Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
