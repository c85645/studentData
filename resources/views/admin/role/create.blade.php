@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">角色管理</li>
  </ol>
</div><!--/.row-->

<h1 class="page-header">角色管理</h1>

<div class="row">
  <div class="col-xs-offset-4 col-xs-4">
    <form method="post" action="/admin/role">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <h3>角色代碼</h3>
        <input type="text" name="role_id" class="form-control" value="{{ old('role_id') }}" placeholder="請輸入角色代碼(英文)..." maxlength="20" onkeyup="enterArabEng(this);"><br>
      </div>
      <div class="form-group">
        <h3>角色名稱</h3>
        <input type="text" name="role_name" class="form-control" value="{{ old('role_name') }}" placeholder="請輸入角色名稱..." maxlength="20"><br>
      </div>
      <div class="form-group">
        <h3>操作權限</h3>
        {{-- <input type="text" name="role_name" class="form-control" value="{{ old('role_name') }}" placeholder="請輸入角色名稱..." maxlength="20"><br> --}}
      </div>
      <div align="center">
         <input class="btn btn-primary" type="submit" value="儲存">
      </div>
      @include('layout.common.errors')
    </form>
  </div>
</div>
@endsection
