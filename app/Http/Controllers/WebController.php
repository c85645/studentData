<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    // 輸入資料頁
    public function toInput()
    {
        return view('web.input');
    }
}
