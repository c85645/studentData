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
    <li class="active">前台表單</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">前台表單</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
    <a class="btn btn-primary btn-lg" href="{{ route('frontData.create') }}" role="button"><i class="fa fa-plus"></i></a>
    <a class="btn btn-warning btn-lg" href="{{ route('applicant.index') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
  <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="{{ route('applicant.search') }}">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入姓名" value="{{ $keyword }}">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th width="20%">姓名</th>
    <th width="20%">手機</th>
    <th width="20%">是否繳交pdf檔</th>
    <th width="20%">上傳時間</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    @foreach($applicants as $applicant)
    <tr>
      <td>{{ $applicant->name }}</td>
      <td>{{ $applicant->mobile }}</td>
      <td>
        @if ($applicant->pdf_path != null)
          <p style="color: blue;">已繳交</p>
        @else
          <p style="color: red;">未繳交</p>
        @endif
      </td>
      <td>{{ $applicant->created_at }}</td>
      <td>
        <form class="form-inline" method="post" action="/studentData/admin/applicant/frontData/{{ $applicant->id }}">
          <a class="btn btn-success" href="/studentData/admin/applicant/frontData/{{ $applicant->id }}/edit"><i class="fa fa-pencil"> </i></a>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <button class="btn btn-danger" type="submit" name=""><i class="fa fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div align="center">{!! $applicants->render() !!}</div>
@endsection
