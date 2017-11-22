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

// 登入頁面
Route::get('/', function () {
    return view('auth.login');
});

// 後台首頁
Route::get('/admin', function () {
    return view('admin.index');
});

// 學制管理 Prototype


// 學生資料管理 Prototype


// 使用者設定 Prototype
Route::get('/admin/userSetting', function () {
    return view('admin.userSetting');
});

// 角色設定 Prototype
Route::get('/admin/roleSetting', function () {
    return view('admin.roleSetting');
});

// 權限設定 Prototype
Route::get('/admin/authSetting', function () {
    return view('admin.authSetting');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
