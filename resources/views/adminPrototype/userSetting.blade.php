@extends('layout.admin.master')

@section('html')
<div class="container">
  <h4> <i class="fa fa-user" aria-hidden="true"></i>帳號管理-使用者設定</h4>

  {{-- <section class="row text-center placeholders">
    <h4>第一個區塊</h4>
  </section> --}}

  <div align="center">
    <input type="button" class="btn btn-success btn-sm" value="新增使用者" />
  </div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>帳號</th>
          <th>姓名</th>
          <th>狀態</th>
          <th>查詢</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>001</td>
          <td>閔慈</td>
          <td>啟用</td>
          <td><a href="#"><i class="fa fa-search"></i></a></td>
        </tr>
        <tr>
          <td>002</td>
          <td>阿寬</td>
          <td>停用</td>
          <td><a href="#"><i class="fa fa-search"></i></a></td>
        </tr>
        <tr>
          <td>003</td>
          <td>胡梨</td>
          <td>啟用</td>
          <td><a href="#"><i class="fa fa-search"></i></a></td>
        </tr>
      </tbody>
    </table>
    <span class="pagebanner">共 3 筆資料。</span><span class="pagelinks"></span>
  </div>
</div>
@endsection
