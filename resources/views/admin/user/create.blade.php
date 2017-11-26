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
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/admin/user" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        {{-- <h3>帳號</h3> --}}
        <label class="col-sm-2 control-label" for="account">帳號</label>
        <div class="col-sm-8">
          <input type="text" name="account" class="form-control" value="{{ old('account') }}" placeholder="請輸入英文..." maxlength="20" onkeyup="enterArabEng(this);">
        </div>
      </div>
      <div class="form-group">
        {{-- <h3>姓名</h3> --}}
        <label class="col-sm-2 control-label" for="name">姓名</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="請輸入個人帳號名稱..." maxlength="20">
        </div>
      </div>
      <div class="form-group">
        {{-- <h3>密碼</h3> --}}
        <label class="col-sm-2 control-label" for="password">密碼</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control" placeholder="密碼最大長度不超過20" value="{{ old('password') }}" maxlength="20" onkeyup="enterArabEng(this);">
        </div>
      </div>
      <div class="form-group">
        {{-- <h3>角色</h3> --}}
        <label class="col-sm-2 control-label" for="role_id">角色</label>
        <div class="col-sm-8">
          <select name="role_id" class="form-control">
            <option value="3">評審委員</option>
            <option value="2" selected>管理員</option>
            <option value="1">最高管理員</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        {{-- <h3>狀態</h3> --}}
        <label class="col-sm-2 control-label" for="status">狀態</label>
        <div class="col-sm-8">
          {{-- <select name="status" class="form-control">
            <option value="1">啟用</option>
            <option value="0">停用</option>
          </select> --}}
          <label class="radio-inline">
            <input type="radio" name="status" id="radio1" value="1"> 啟用
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" id="radio2" value="0"> 停用
          </label>
        </div>
      </div>
      <div align="center">
         <input class="btn btn-primary" type="submit" value="儲存">
      </div>
    </form>
  </div>
</div>
@endsection
