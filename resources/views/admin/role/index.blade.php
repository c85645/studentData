@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
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
  <div class="col-xs-4">
    <a class="btn btn-primary btn-lg" href="/studentData/admin/role/create" role="button"><i class="fa fa-plus"></i></a>
    {{-- <a class="btn btn-default" href="/admin" role="button"><i class="fa fa-home"></i>回上頁</a> --}}
  </div>
  <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="/studentData/admin/role">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入角色代碼..." value="{{ $keyword }}" onkeyup="enterArabEng(this);">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div>
</div>
<table class="table table-bordered table-hover table-middle">
  <thead>
    <th width="20%">代碼</th>
    <th width="30%">名稱</th>
    <th width="30%">權限</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    @foreach($rows as $role)
    <tr>
      <td>{{ $role->role_id }}</td>
      <td><label>{{ $role->role_name }}</label></td>
      <td>{{ implode(', ', $role->permissions()->pluck('title')->toArray()) }}</td>
      <td>
        <form class="form-inline" method="post" action="/studentData/admin/role/{{ $role->id }}">
          <a class="btn btn-success" href="/studentData/admin/role/{{ $role->id }}/edit"><i class="fa fa-pencil"> </i></a>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          @if($role->role_id != 'administrator' && $role->role_id != 'manager' && $role->role_id != 'teacher')
          <button class="btn btn-danger" type="submit" name=""><i class="fa fa-trash"></i></button>
          @endif
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $rows->render() !!}
@endsection
