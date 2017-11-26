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
  <div class="col-xs-4">
    <a class="btn btn-primary btn-lg" href="/admin/role/create" role="button"><i class="fa fa-plus"></i>新增</a>
    {{-- <a class="btn btn-default" href="/admin" role="button"><i class="fa fa-home"></i>回上頁</a> --}}
  </div>
  <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="/admin/role">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入角色代碼..." value="{{ $keyword }}" onkeyup="enterArabEng(this);">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div>
</div>

<table class="table table-bordered table-hover table-middle">
  <thead>
    {{-- <th width="10%">ID</th> --}}
    <th width="20%">代碼</th>
    <th width="30%">名稱</th>
    <th width="30%">權限</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    @foreach($rows as $role)
    <tr>
      {{-- <td>{{ $role->id }}</td> --}}
      {{-- <td><a href="/admin/role/{{ $role->id }}">{{ $role->role_id }}</a></td> --}}
      <td>{{ $role->role_id }}</td>
      <td><label>{{ $role->role_name }}</label></td>
      <td>XOXO</td>
      <td>
        <form class="form-inline" method="post" action="/admin/role/{{ $role->id }}">
          <a class="btn btn-success" href="/admin/role/{{ $role->id }}/edit"><i class="fa fa-pencil"> </i>修改</a>
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-danger" type="submit" name=""><i class="fa fa-trash"></i>刪除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<span class="pagebanner">共 {{ count($rows) }} 筆資料。</span><span class="pagelinks"></span>
@endsection
