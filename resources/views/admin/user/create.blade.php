@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">帳號管理</li>
  </ol>
</div><!--/.row-->

<h1 class="page-header">帳號管理</h1>

<div class="row">
  <div class="col-xs-offset-4 col-xs-4">
    <form method="post" action="/admin/user">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <h3>帳號</h3>
        <input type="text" name="account" class="form-control" value="{{ old('account') }}"><br>
      </div>
      <div class="form-group">
        <h3>姓名</h3>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}"><br>
      </div>
      <div class="form-group">
        <h3>密碼</h3>
        <input type="password" name="password" class="form-control" value="{{ old('password') }}"><br>
      </div>
      <div class="form-group">
        <h3>角色</h3>
        <select name="role" class="form-control">
          <option value="3">評審委員</option>
          <option value="2">管理員</option>
          <option value="1">最高管理員</option>
        </select>
      </div>
      <div class="form-group">
        <h3>狀態</h3>
        <select name="status" class="form-control">
          <option value="1">啟用</option>
          <option value="0">停用</option>
        </select>
      </div>
      <input class="btn btn-primary" type="submit" value="儲存">
      @include('layout.common.errors')
    </form>
  </div>
</div>
@endsection
