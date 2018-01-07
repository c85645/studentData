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
    <li class="active">是否通過</li>
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
    <h4>是否通過</h4>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form id="action_form" action="/studentData/admin/gradeManagement/manager/{{ $applicant->id }}" method="post" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="col-sm-6 control-label"> 姓名</label>
        <span class="col-sm-6"> {{ $applicant->name }}</span>
      </div>
      <div class="form-group">
        <label class="col-sm-6 control-label"> 准考證號碼</label>
        <span class="col-sm-6">{{ $applicant->exam_number }}</span>
      </div>
      <div class="form-group">
        <label class="col-sm-6 control-label">是否通過</label>
        <div class="col-xs-6">
          <label class="radio-inline">
          <input type="radio" name="is_pass" value="1" @if($applicant->is_pass == 1) checked @endif> 通過
        </label>
        <label class="radio-inline">
          <input type="radio" name="is_pass" value="0" @if($applicant->is_pass == 0) checked @endif> 不通過
        </label>
        </div>
      </div>
      <div align="center">
        <button class="btn btn-primary" type="submit">儲存</button>
      </div>
    </form>
  </div>
</div>
@endsection
