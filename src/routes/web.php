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

//Route::get('/', function () {
//    return redirect('/home');
//});

Auth::routes();


// 后台路由
Route::group(['middleware' => 'auth', 'namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'IndexController@index'); // 首页

    Route::group(['prefix' => 'article'], function (){
        Route::get('/', 'ArticleController@index'); //
        Route::get('/add', 'ArticleController@editOrAdd'); //
        Route::get('/edit/{id}', 'ArticleController@editOrAdd'); //
        Route::post('/create', 'ArticleController@postUpdateOrCreate'); //
        Route::get('/delete/{id}', 'ArticleController@postDelete'); //
    });

    Route::group(['prefix' => 'user'], function(){
       Route::get('/', 'UserController@index');
    });

});

Route::group(['namespace' => 'Home', 'prefix' => '', 'as' => 'home::'], function () {
    Route::any('/', 'IndexController@index');
    Route::post('/list', 'ArticleController@articleList'); // article_list
    Route::post('/recommend', 'ArticleController@articleList'); // recommend_list
    Route::any('/detail/{id}', 'IndexController@detail');
});
//Route::get('/home', 'HomeController@index')->name('home');
