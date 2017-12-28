@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">申請人資料管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name->name }}</li>
    <li class="active">繳交紙本</li>
    <li class="active">匯入</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">匯入</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-2 col-xs-6">
    <form action="{{ route('importData.import') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="sr-only">上傳資料</label>
        <input name="file" type="file" class="form-control" placeholder="excel上傳" accept=".xls,.xlsx,application/vnd.ms-excel" required>
      </div>
      <div align="center">
        <input class="btn btn-primary" type="submit" value="匯入">
        <a class="btn btn-warning" href="{{ route('applicant.search') }}" role="button">取消</a>
      </div>
    </form>
  </div>
</div>
@endsection
