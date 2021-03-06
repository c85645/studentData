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
<div class="row">
  <div class="col-xs-4">
    <a class="btn btn-primary btn-lg" href="/studentData/admin/user/create" role="button"><i class="fa fa-plus"></i></a>
  </div>
  <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="/studentData/admin/user">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入帳號..." value="{{ $keyword }}" onkeyup="enterArabEng(this);">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div>
</div>
<table class="table table-bordered table-hover table-middle">
  <thead>
    <th width="20%">帳號</th>
    <th width="20%">名稱</th>
    <th width="20%">角色</th>
    <th width="20%">狀態</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    @foreach($rows as $user)
    <tr>
      <td>{{ $user->account }}</td>
      <td>{{ $user->name }}</td>
      <td>
        {{ implode(', ', $user->roles->pluck('role_name')->toArray()) }}
      </td>
      <td>
        @if($user->status == 1)
        啟用
        @else
        停用
        @endif
      </td>
      <td>
      <form id="dataForm{{$user->id}}" class="form-inline" method="post" action="/studentData/admin/user/{{ $user->id }}">
          <a class="btn btn-success" href="/studentData/admin/user/{{ $user->id }}/edit"><i class="fa fa-pencil"> </i></a>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          @if($user->id != 1)
          <button class="btn btn-danger" type="button" onclick="goSubmit({{$user->id}})"><i class="fa fa-trash"></i></button>
          @endif
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $rows->render() !!}
@endsection
@section('javascript')
<script type="text/javascript">
  function goSubmit(id) {
    var msg = "確定要執行刪除？";
    if (confirm(msg)) {
      $("#dataForm" + id).submit();
    }
  }
</script>
@endsection
