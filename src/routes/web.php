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


// 后台路由
Route::group(['middleware' => 'auth', 'namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'IndexController@index'); // 首页

    Route::group(['prefix' => 'article'], function (){
        Route::get('/', 'ArticleController@index'); // article_list
        Route::get('/add', 'ArticleController@editOrAdd'); //
        Route::get('/edit/{id}', 'ArticleController@editOrAdd'); //
        Route::post('/create', 'ArticleController@postUpdateOrCreate'); //
        Route::get('/delete/{id}', 'ArticleController@postDelete'); //
    });

    Route::group(['prefix' => 'user'], function(){
       Route::get('/', 'UserController@index');
    });

});