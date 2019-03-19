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

use function foo\func;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', ['uses' => 'Auth\LoginController@logout']);

Route::group(['namespace' => 'frontEnd'], function (){
    Route::get('/', ['uses' => 'IndexController@index' ]);
    Route::get('/category', ['uses' => 'IndexController@category' ]);
    Route::get('/post', ['uses' => 'IndexController@post' ]);
});

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/category', ['uses' => 'CategoryController@index']);
    Route::get('/category/store', ['uses' => 'CategoryController@getStore']);
    Route::post('/category/store', ['uses' => 'CategoryController@Store']);
    Route::get('/category/edit/{id}', ['uses' => 'CategoryController@show']);
    Route::put('/category/edit/{id}', ['uses' => 'CategoryController@edit']);
    Route::get('/category/delete/{id}', ['uses' => 'CategoryController@destroy']);

    Route::get('/post', ['uses' => 'PostController@index']);
    Route::get('/post/store', ['uses' => 'PostController@getStore']);
    Route::post('/post/store', ['uses' => 'PostController@store']);
    Route::get('/post/edit/{id}', ['uses' => 'PostController@show']);
    Route::put('/post/edit/{id}', ['uses' => 'PostController@edit']);
    Route::get('/post/delete/{id}', ['uses' => 'PostController@destroy']);
});




