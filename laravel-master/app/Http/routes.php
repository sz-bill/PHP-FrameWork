<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {        return view('welcome');    });
    //前台用户
    Route::any('home/login', 'Auth\AuthController@login');
    Route::get('home/logout', 'Auth\AuthController@logout');
    Route::any('home/register', 'Auth\AuthController@register');

    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::auth();

    //后台用户
    Route::any('/login', 'Admin\AuthController@login');
    Route::get('/logout', 'Admin\AuthController@logout');
    Route::any('/register', 'Admin\AuthController@register');


    Route::any('/category', 'Admin\CategoryController@index');
    Route::any('/category/add', 'Admin\CategoryController@add');
    Route::any('/category/edit', 'Admin\CategoryController@edit');

    Route::any('/product', 'Admin\ProductController@index');
    Route::any('/product/add', 'Admin\ProductController@add');
    Route::any('/product/edit', 'Admin\ProductController@edit');
    Route::post('/product/postEdit', 'Admin\ProductController@postEdit');
    Route::any('/product/delete', 'Admin\ProductController@delete');

    Route::get('/', 'AdminController@index');
});
