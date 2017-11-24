@extends('layout.admin.master')

@section('html')
<div class="container">

  <div id="con">
    <h4><i class="fa fa-user" aria-hidden="true"></i>帳號管理-角色設定</h4>
    <table align="center">
      <tr>
        <th>角色代碼</th>
        <td><input class="form-control" type="text" name="" size="15" /></td>
        <td><a href="#"><i class="fa fa-search"></i></a><a href="#"><i class="fa fa-plus"></i></a></td>
      </tr>
    </table>
  </div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>角色代碼</th>
          <th>角色名稱</th>
          <th>功能</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>admin</td>
          <td>系統管理員</td>
          <td><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        <tr>
          <td>teacher</td>
          <td>委員</td>
          <td><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></td>
        </tr>
      </tbody>
    </table>
    <span class="pagebanner">共 2 筆資料。</span><span class="pagelinks"></span>
  </div>
</div>
@endsection
