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
// 預設登入機制，先不使用
// Auth::routes();
// Route::get('/', 'HomeController@index');

// 前台
Route::group(['prefix' => 'studentData'], function(){
    // 前台首頁-先進入controller再導頁
    // TODO
    Route::get('/', 'WebController@index');
    // 輸入資料頁
    Route::get('/input', 'WebController@toInput');
});

// 後台
Route::group(['middleware' => ['auth', 'checkPermission'], 'prefix' => 'studentData/admin'], function(){
    // 後台首頁
    Route::get('/', function () {
        return view('admin.index');
    });

    // 使用者設定
    Route::resource('user', 'UserController');
    // ajax 重置密碼
    Route::post('resetPassword', 'UserController@resetPassword');
    // 角色設定
    Route::resource('role', 'RoleController');
    // 帳號設定
    Route::get('account', function () {
        return view('admin.account.edit');
    });
    Route::put('account/{id}', 'UserController@updateAccount');

    // 學制管理
    Route::get('academy', 'AcademyController@index');
    Route::get('academy/{id}/edit', 'AcademyController@edit');
    Route::put('academy/{id}', 'AcademyController@update');

    // 學制年度設定
    Route::get('academyYear', 'AcademyYearController@index');
    Route::put('academyYear/edit', 'AcademyYearController@edit');
    Route::put('academyYear/update', 'AcademyYearController@update');

    // 學制權限設定
    Route::get('academyPermission', 'AcademyPermissionController@index');
    Route::get('academyPermission/edit', 'AcademyPermissionController@edit');
    Route::put('academyPermission/update', 'AcademyPermissionController@update');

    // 申請人資料管理
    // TODO
    Route::get('applicant', function () {
        return view('admin.applicant.index');
    });

    // 考委評分管理
    // TODO 先進入controller再導頁，管理員與委員顯示的畫面不同
    Route::get('gradeManagement', 'GradeManageController@index');
});

// 登入頁GET Request
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);

// 登入認證
Route::post('login', 'LoginController@authenticate');

// 登出
Route::get('logout', 'LoginController@logout');
