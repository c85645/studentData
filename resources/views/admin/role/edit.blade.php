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
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/admin/role/{{$role->id}}" class="form-horizontal">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="role_id"><span style="color: red">*</span> 角色代碼</label>

        <div class="col-sm-8">
          <input type="text" name="role_id" class="form-control" value="{{ old('role_id',$role->role_id) }}" placeholder="請輸入角色代碼(英文)..." maxlength="20" onkeyup="enterArabEng(this);" disabled=""><br>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="role_name"><span style="color: red">*</span> 角色名稱</label>

        <div class="col-sm-8">
          <input type="text" name="role_name" class="form-control" value="{{ old('role_name',$role->role_name) }}" placeholder="請輸入角色名稱..." maxlength="20"><br>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">操作權限</label>

        <div class="col-sm-8">
          TODO
        </div>
      </div>
      <div align="center">
         <input class="btn btn-primary" type="submit" value="儲存">
      </div>
    </form>
  </div>
</div>
@endsection
