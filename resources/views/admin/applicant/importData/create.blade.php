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
    <li class="active">新增</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">繳交紙本</h1>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="{{ route('importData.store') }}" class="form-horizontal">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <input type="hidden" name="academy_id" value="{{ $academy->id }}">
      <div class="form-group">
        <label class="col-sm-2 control-label" for="exam_number"> 准考證號碼</label>
        <div class="col-sm-8">
          <input type="text" name="exam_number" class="form-control" maxlength="30" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"> 姓名</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" maxlength="30" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="gender"> 性別</label>
        <div class="col-sm-8">
          <label class="radio-inline">
            <input type="radio" name="gender" value="1" required> 男
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" value="2"> 女
          </label>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="graduated_school"> 畢業學校</label>
        <div class="col-sm-8">
          <input type="text" name="graduated_school" class="form-control" maxlength="30">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="graduated_department"> 畢業學系</label>
        <div class="col-sm-8">
          <input type="text" name="graduated_department" class="form-control" maxlength="30">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="equivalent_qualifications"> 同等學歷與否</label>
        <div class="col-sm-8">
          <input type="text" name="equivalent_qualifications" class="form-control" maxlength="30">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="identity"> 身份別</label>
        <div class="col-sm-8">
          <input type="text" name="identity" class="form-control" maxlength="30">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="graduated_school_classification"> 畢業學校類別</label>
        <div class="col-sm-8">
          <input type="text" name="graduated_school_classification" class="form-control" maxlength="30">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="birth"> 生日</label>
        <div class="col-sm-8">
          <input type="date" name="birth" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="personal_id"> 身分證字號</label>
        <div class="col-sm-8">
          <input type="text" name="personal_id" class="form-control" maxlength="10" onkeyup="enterDigitalEnglish(this);" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="address"> 地址</label>
        <div class="col-sm-8">
          <input type="text" name="address" class="form-control" maxlength="100">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="mobile"> 手機</label>
        <div class="col-sm-8">
          <input type="text" name="mobile" class="form-control" maxlength="10" onkeyup="enterNum(this);" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email"> 信箱</label>
        <div class="col-sm-8">
          <input type="text" name="email" class="form-control" maxlength="30">
        </div>
      </div>
      {{-- <div class="form-group">
        <label class="col-sm-2 control-label" for="email"> 是否通過第一階段</label>
        <div class="col-sm-8">
          <label class="radio-inline">
            <input type="radio" name="is_pass" value="1" required> 通過
          </label>
          <label class="radio-inline">
            <input type="radio" name="is_pass" value="0" checked> 不通過
          </label>
        </div>
      </div> --}}
      <div align="center">
        <input class="btn btn-primary" type="submit" value="儲存">
        <a class="btn btn-warning" href="{{ route('applicant.search') }}" role="button">取消</a>
      </div>
    </form>
  </div>
</div>
@endsection
