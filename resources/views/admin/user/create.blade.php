@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">帳號管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">帳號管理</h1>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/studentData/admin/user" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="col-sm-2 control-label" for="account"><span style="color: red">*</span> 帳號</label>
        <div class="col-sm-8">
          <input type="text" name="account" class="form-control" value="{{ old('account') }}" placeholder="請輸入英文帳號..." maxlength="20" onkeyup="enterArabEng(this);">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"><span style="color: red">*</span> 名稱</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="請輸入名稱..." maxlength="20">
        </div>
      </div>
      {{-- <div class="form-group">
        <label class="col-sm-2 control-label" for="password">密碼</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control" placeholder="密碼最大長度不超過20" value="{{ old('password') }}" maxlength="20" onkeyup="enterArabEng(this);">
        </div>
      </div> --}}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="role_id"><span style="color: red">*</span> 角色</label>
        <div class="col-sm-8">
          @foreach($roles as $role)
          <label class="radio-inline">
            <input type="radio" name="role_id" id="radio1" value="{{ $role->id }}"> {{ $role->role_name }}
          </label>
          @endforeach
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="status"><span style="color: red">*</span> 狀態</label>
        <div class="col-sm-8">
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
        <a class="btn btn-warning" href="/studentData/admin/user" role="button">取消</a>
      </div>
    </form>
  </div>
</div>
@endsection
