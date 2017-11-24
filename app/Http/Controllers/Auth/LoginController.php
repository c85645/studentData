<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin.index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'name';
    }

    // 登入頁
    public function showLoginForm()
    {
        dd(bcrypt('admin'));
        // return view('auth.login');
    }

    // 登入
    public function authenticate()
    {
        $email = request()->input('email');
        $password = request()->input('password');

        // dd(request()->input());
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->to('admin.index');
            // return 'loggin success';
        } else {
            return '失敗';
        }
    }

    // 登出並導頁
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

}
