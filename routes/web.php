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

// 首頁
Route::get('/', function(){
    return view('web.index');
});

// Auth::routes();
// Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    // // 後台首頁
    Route::get('/', function () {
        return view('admin.index');
    });
    // 學制管理
    // 學生資料管理
    // 使用者設定
    Route::resource('user', 'UserController');
    // 角色設定
    Route::resource('role', 'RoleController');
    // 學制權限設定
    Route::get('academyPermission', function () {
        return view('admin.permission');
    });
});

// 登入頁GET Request
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);

// 登入認證
Route::post('login', 'LoginController@authenticate');

// 登出
Route::get('logout', 'LoginController@logout');

