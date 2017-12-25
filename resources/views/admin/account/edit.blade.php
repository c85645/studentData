@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">帳號設定</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">帳號設定</h1>
  </div>
</div>

@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/studentData/admin/account/{{auth()->user()->id}}" class="form-horizontal">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="account"> 帳號</label>

        <div class="col-sm-8">
          <input type="text" name="account" class="form-control" value="{{ old('account',auth()->user()->account) }}" placeholder="請輸入英文帳號..." maxlength="20" onkeyup="enterArabEng(this);" disabled="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"><span style="color: red">*</span> 名稱</label>

        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" value="{{ old('name',auth()->user()->name) }}" placeholder="請輸入名稱..." maxlength="20">
        </div>
      </div>

      {{-- 修改密碼 --}}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="password"><span style="color: red">*</span> 新密碼</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control" placeholder="密碼最大長度不超過20" value="{{ old('password') }}" maxlength="20" onkeyup="enterArabEng(this);">
        </div>
      </div>
      <div align="center">
         <input class="btn btn-primary" type="submit" value="儲存">
      </div>
    </form>
  </div>
</div>
@endsection
