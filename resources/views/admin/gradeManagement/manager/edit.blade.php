@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name->name }}</li>
    <li class="active">第二階段成績</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
    <a class="btn btn-warning btn-lg" href="{{ route('manager.result') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <h4>輸入第二階段成績</h4>
  </div>
</div>
<form id="action_form" action="{{ route('manager.store') }}" method="post">
  {{ csrf_field() }}
  <table class="table table-hover table-middle">
    <thead>
      <th>姓名</th>
      <th>准考證號碼</th>
      <th>面試成績</th>
    </thead>
    <tbody>
      @foreach ($applicants as $applicant)
      <tr>
        <input type="hidden" name="dataList[student_id][]" value="{{ $applicant->id }}"/>
        <td>{{ $applicant->name }}</td>
        <td>{{ $applicant->exam_number }}</td>
        <td><input class="form-control" name="dataList[score][]" type="number" max="100" required value="{{ $applicant->score }}"></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div align="center">
    <button class="btn btn-primary" type="submit">儲存</button>
  </div>
</form>
@endsection
