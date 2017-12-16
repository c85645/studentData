<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\User;

class LoginController extends Controller
{
    // 登入頁
    public function showLoginForm()
    {
        // dd(bcrypt('admin'));
        return view('auth.login');
    }

    // 登入
    public function authenticate()
    {
        $account = request()->input('account');
        $password = request()->input('password');

        // dd(request()->input());
        if (Auth::attempt(['account' => $account, 'password' => $password, 'status' => 1])) {
            // Authentication passed...
            return redirect()->to('/studentData/admin/');
        } else {
            // return '您輸入的資料有錯誤或帳號已被停用';
            return back()->withInput()->withErrors([
                'errors' => '您輸入的資料有錯誤或帳號已被停用',
            ]);
        }
    }

    // 登出並導頁
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
