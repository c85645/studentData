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

Auth::routes();
// Route::get('/', 'HomeController@index');

// Route::group(['middleware' => 'auth'], function(){

// });

// Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);

// // 登入頁GET Request
// Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);

// // 登入認證
// Route::post('login', 'LoginController@authenticate');

// // 登出
// Route::get('logout', 'LoginController@logout');

Route::get('/', function(){
    return view('web.index');
});

Route::get('/loginPage', function(){
    return view('auth.login');
});

// // 後台首頁
Route::get('/admin', function () {
    return view('admin.index');
});
// 學制管理
// 學生資料管理
// 使用者設定
Route::get('/admin/user', function () {
    return view('admin.user');
});
// 角色設定
Route::get('/admin/role', function () {
    return view('admin.role');
});
// 學制權限設定
Route::get('/admin/permission', function () {
    return view('admin.permission');
});

// =================================================================== Prototype ===================================================================

// // 後台首頁
Route::get('/adminPrototype', function () {
    return view('adminPrototype.index');
});
// 學制管理 Prototype
// 學生資料管理 Prototype
// 使用者設定 Prototype
Route::get('/adminPrototype/userSetting', function () {
    return view('adminPrototype.userSetting');
});
// 角色設定 Prototype
Route::get('/adminPrototype/roleSetting', function () {
    return view('adminPrototype.roleSetting');
});
// 學制權限設定
Route::get('/adminPrototype/authSetting', function () {
    return view('adminPrototype.authSetting');
});
