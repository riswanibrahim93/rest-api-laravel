<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Auth')->group(function(){
	Route::post('register', 'RegisterController');
	Route::post('login', 'LoginController');
	Route::post('logout', 'LogoutController');
});

Route::namespace('Artikel')->middleware('auth:api')->group(function(){
	Route::post('create-new-artikel', 'ArtikelController@store');
	Route::patch('update-artikel/{artikel}', 'ArtikelController@update');
	Route::delete('delete-artikel/{artikel}', 'ArtikelController@destroy');
});

Route::get('artikel/{artikel}','Artikel\ArtikelController@show');
Route::get('artikel','Artikel\ArtikelController@index');

Route::get('user', 'UserController');

