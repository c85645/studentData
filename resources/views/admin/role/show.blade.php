@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">角色管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">角色管理</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-4 col-xs-4"><h1>角色代碼：{{ $role->role_id }}</h1></div>
  <div class="col-xs-offset-4 col-xs-4"><h1>角色名稱：{{ $role->role_name }}</h1></div>
  <div class="col-xs-offset-4 col-xs-4"><h1>操作權限：</h1></div>
</div>
@endsection
