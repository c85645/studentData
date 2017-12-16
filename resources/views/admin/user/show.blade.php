@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">首頁</li>
    <li class="active">帳號管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">帳號管理</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-4 col-xs-4"><h1>帳號</h1></div>
  <div class="col-xs-offset-4 col-xs-4"><h1>{{ $user->account }}</h1></div>
  <div class="col-xs-offset-4 col-xs-4"><p>{{ $user->name }}</p></div>
  <div class="col-xs-offset-4 col-xs-4"><small>{{ $user->created_at }}</small></div>
</div>
@endsection
