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

//    分类目录管理
    Route::any('/category', 'Admin\CategoryController@index');
    Route::any('/category/add', 'Admin\CategoryController@add');
    Route::any('/category/edit', 'Admin\CategoryController@edit');

//    产品管理
    Route::any('/product', 'Admin\ProductController@index');
    Route::any('/product/add', 'Admin\ProductController@add');
    Route::any('/product/edit', 'Admin\ProductController@edit');
    Route::post('/product/postEdit', 'Admin\ProductController@postEdit');
    Route::any('/product/delete', 'Admin\ProductController@delete');
    Route::any('/product/uploadImage', 'Admin\ProductController@uploadImage');

//    Banner管理
    Route::any('/bannerManager', 'Admin\BannerController@index');
    Route::any('/bannerManager/add', 'Admin\BannerController@add');
    Route::any('/bannerManager/edit', 'Admin\BannerController@edit');
    Route::post('/bannerManager/postEdit', 'Admin\BannerController@postEdit');
    Route::any('/bannerManager/delete', 'Admin\BannerController@delete');


    //    首页内容管理
    Route::any('/ManageHome', 'Admin\ManageHomeController@index');
    Route::any('/ManageHome/add', 'Admin\ManageHomeController@add');
    Route::any('/ManageHome/edit', 'Admin\ManageHomeController@edit');
    Route::post('/ManageHome/postEdit', 'Admin\ManageHomeController@postEdit');
    Route::any('/ManageHome/delete', 'Admin\ManageHomeController@delete');

    //    会员管理
    Route::any('/user', 'Admin\UserController@index');
    Route::any('/user/add', 'Admin\UserController@add');
    Route::any('/user/edit', 'Admin\UserController@edit');
    Route::post('/user/postEdit', 'Admin\UserController@postEdit');
    Route::any('/user/delete', 'Admin\UserController@delete');

    Route::get('/welcome', 'AdminController@welcome');
    Route::get('/', 'AdminController@index');
});
