@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">委員評分管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">委員評分管理</h1>
  </div>
</div>
@endsection
