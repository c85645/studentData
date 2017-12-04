@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">首頁</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header">歡迎使用東吳大學巨量資料學院後台管理系統</h2>
  </div>
</div>
@include('layout.common.errors')

@endsection
