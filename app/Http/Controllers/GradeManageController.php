<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeManageController extends Controller
{
    public function index()
    {
        // 依照管理員與委員給予指定不同的頁面
        if (auth()->user()->isManager()) {
            return view('admin.gradeManagement.manager.index');
        } else {
            return view('admin.gradeManagement.teacher.index');
        }

    }
}
