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
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="{{ route('applicant.update') }}" class="form-horizontal">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="account"><span style="color: red">*</span> 帳號</label>

        <div class="col-sm-8">
          <input type="text" name="account" class="form-control" {{-- value="{{ old('account',$user->account) }}" --}} placeholder="請輸入英文帳號..." maxlength="20" onkeyup="enterArabEng(this);" disabled="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"><span style="color: red">*</span> 名稱</label>

        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" {{-- value="{{ old('name',$user->name) }}" --}} placeholder="請輸入名稱..." maxlength="20">
        </div>
      </div>

      <div align="center">
         <input class="btn btn-primary" type="submit" value="儲存">
      </div>
    </form>
  </div>
</div>
@endsection
