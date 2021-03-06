@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">帳號管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">帳號管理</h1>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <form method="post" action="/studentData/admin/user/{{$user->id}}" class="form-horizontal">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label class="col-sm-2 control-label" for="account"><span style="color: red">*</span> 帳號</label>
        <div class="col-sm-8">
          <input type="text" name="account" class="form-control" value="{{ old('account',$user->account) }}" placeholder="請輸入英文帳號..." maxlength="20" onkeyup="enterArabEng(this);" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="name"><span style="color: red">*</span> 名稱</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" placeholder="請輸入名稱..." maxlength="20">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="role_id"><span style="color: red">*</span> 角色</label>
        <div class="col-sm-8">
          @foreach($roles as $role)
          <label class="radio-inline">
            <input type="radio" name="role_id" value="{{ $role->id }}" {{ $user->getRoleId() == $role->id ? 'checked' : ''}}> {{ $role->role_name }}
          </label>
          @endforeach
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="status"><span style="color: red">*</span> 狀態</label>
        <div class="col-sm-8">
          <label class="radio-inline">
            <input type="radio" name="status" value="1" {{ $user->status == '1' ? 'checked' : '' }}> 啟用
          </label>
          <label class="radio-inline">
            <input type="radio" name="status" value="0" {{ $user->status == '0' ? 'checked' : '' }}> 停用
          </label>
        </div>
      </div>
      <div align="center">
        <label>
          <span style="color: red">* 提示：重置密碼會將密碼重置與帳號相同</span>
        </label>
      </div>
      <div align="center">
        <input class="btn btn-primary" type="submit" value="儲存">
        <a class="btn btn-warning" href="/studentData/admin/user" role="button">取消</a>
        <input class="btn btn-danger" type="button" value="重置密碼" onclick="resetPassword();">
      </div>
    </form>
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  function resetPassword() {
    var param = { 'user_id' : {{ $user->id }} };
    var url = "{{ url('studentData/admin/resetPassword') }}";
    ajaxRequest(url, param, resetSuccess, resetFailed);
  }

  function resetSuccess(data) {
    if(data != undefined && data != ''){
        alert(data.msg);
    }
  }

  function resetFailed() {
    alert("Call Api Failed!");
  }
</script>
@endsection
