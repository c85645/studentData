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
    <li class="active">修改</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">前台表單</h1>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/studentData/admin/applicant/frontData/{{ $applicant->id }}/update" class="form-horizontal" enctype="multipart/form-data">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <input type="hidden" name="academy_id" value="{{ $academy->id }}">
      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"> 姓名</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" minlength="2" maxlength="10" value="{{ $applicant->name }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="mobile"> 手機</label>
        <div class="col-sm-8">
          <input type="text" name="mobile" class="form-control" maxlength="10" onkeyup="enterNum(this);" value="{{ $applicant->mobile }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email"> 信箱</label>
        <div class="col-sm-8">
          <input type="text" name="email" class="form-control" maxlength="30" value="{{ $applicant->email }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="personal_id"> 身分證後六碼</label>
        <div class="col-sm-8">
          <input type="text" name="personal_id" class="form-control" maxlength="6" onkeyup="enterNum(this);" value="{{ $applicant->personal_id }}">
        </div>
      </div>
      @if ($academy->name_id == 'A')
      <div class="form-group">
        <label class="col-sm-2 control-label" for="transfer_grade"> 年級</label>
        <div class="col-sm-8">
          <select class="form-control" name="transfer_grade">
            <option value="">請選擇年級</option>
            <option value="1" {{ ($applicant->transfer_grade == 1) ? 'selected' : '' }}>一</option>
            <option value="2" {{ ($applicant->transfer_grade == 2) ? 'selected' : '' }}>二</option>
            <option value="3" {{ ($applicant->transfer_grade == 3) ? 'selected' : '' }}>三</option>
            <option value="4" {{ ($applicant->transfer_grade == 4) ? 'selected' : '' }}>四</option>
          </select>
        </div>
      </div>
      @endif
      <div class="form-group">
        <label class="col-sm-2 control-label" for="file"> 上傳資料</label>
        <div class="col-sm-8">
          <input type="file" name="file" class="form-control" accept=".pdf,application/pdf">
        </div>
      </div>
      <div align="center">
        <input class="btn btn-primary" type="submit" value="儲存">
        <a class="btn btn-warning" href="{{ route('applicant.search') }}" role="button">取消</a>
      </div>
    </form>
  </div>
</div>
@endsection
