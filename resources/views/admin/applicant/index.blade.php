@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">申請人資料管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">申請人資料管理</h1>
  </div>
</div>
@endsection
