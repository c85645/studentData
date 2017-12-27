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
    Route::get('/', 'WebController@index');
    Route::get('input', 'WebController@redirectToIndex');
    // 輸入資料頁
    Route::post('input', 'WebController@toInput');
    // 儲存
    Route::post('save', 'WebController@save');
});

// 後台
Route::group(['middleware' => ['auth', 'checkPermission'], 'prefix' => 'studentData/admin'], function(){
    // 後台首頁
    Route::get('/', function () {
        return view('admin.index');
    })->name('main');

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
    Route::group(['prefix' => 'academy'], function(){
        Route::get('/', 'AcademyController@index')->name('academy.index');
        Route::get('/{id}/edit', 'AcademyController@edit');
        Route::put('/{id}', 'AcademyController@update');
    });

    // 學制年度設定
    Route::group(['prefix' => 'academyYear'], function(){
        Route::get('/', 'AcademyYearController@index');
        Route::put('edit', 'AcademyYearController@edit');
        Route::put('update', 'AcademyYearController@update');
    });

    // 學制權限設定
    Route::group(['prefix' => 'academyPermission'], function(){
        Route::get('/', 'AcademyPermissionController@index')->name('academyPermission.index');
        Route::get('edit', 'AcademyPermissionController@edit');
        Route::put('update', 'AcademyPermissionController@update');
    });

    // 申請人資料管理
    Route::group(['prefix' => 'applicant'], function(){
        Route::get('/', 'ApplicantController@index')->name('applicant.index');
        Route::get('search', 'ApplicantController@search')->name('applicant.search');

        // 前台表單
        Route::group(['prefix' => 'frontData'], function(){
            Route::get('create', 'FrontDataController@create')->name('frontData.create');
            Route::put('store', 'FrontDataController@store')->name('frontData.store');
            Route::get('{id}/edit', 'FrontDataController@edit');
            Route::put('{id}/update', 'FrontDataController@update');
            Route::delete('{id}', 'FrontDataController@destroy');
        });

        // 後台匯入
        Route::group(['prefix' => 'importData'], function(){
            Route::get('create', 'ImportDataController@create')->name('importData.create');
            Route::put('store', 'ImportDataController@store')->name('importData.store');
            Route::get('{id}/edit', 'ImportDataController@edit');
            Route::put('{id}/update', 'ImportDataController@update');
            Route::delete('{id}', 'ImportDataController@destroy');
        });
    });

    // 考委評分管理
    // 先進入controller再導頁，管理員與委員顯示的畫面不同
    Route::group(['prefix' => 'gradeManagement'], function(){
        Route::get('/', 'GradeManageController@index')->name('gradeManagement.index');
        Route::get('list', 'GradeManageController@list')->name('teacher.list');
        Route::post('score', 'GradeManageController@score')->name('teacher.score');
        Route::post('store', 'GradeManageController@store')->name('teacher.store');
    });
});

// 登入頁GET Request
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);

// 登入認證
Route::post('login', 'LoginController@authenticate');

// 登出
Route::get('logout', 'LoginController@logout');
