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
    <li class="active">報名尚未完成</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">報名尚未完成</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
    <a class="btn btn-warning btn-lg" href="{{ route('applicant.index') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
  {{-- <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="{{ route('applicant.search') }}">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入姓名" value="{{ $keyword }}">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div> --}}
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>身分證字號</th>
    <th>手機號碼</th>
    <th>電子信箱</th>
    <th>狀態</th>
  </thead>
  <tbody>
    @foreach($results as $applicant)
    <tr>
      <td>{{ $applicant['name'] }}</td>
      <td>{{ $applicant['personal_id'] }}</td>
      <td>{{ $applicant['mobile'] }}</td>
      <td>{{ $applicant['email'] }}</td>
      <td>{{ $applicant['status'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{-- <div align="center">{!! $results->render() !!}</div> --}}
@endsection
