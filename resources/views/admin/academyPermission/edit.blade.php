@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制權限管理</li>
    <li class="active">{{ $year }} 學年度</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">學制權限管理</h1>
  </div>
</div>
@include('layout.common.errors')

<div class="row">
    <div class="col-xs-offset-3">
        <form method="post" action="/admin/academyPermission/update" class="form-horizontal">
          <input type="hidden" name="year" value="{{ $year }}">
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          {{ method_field('put') }}
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-2">帳號名稱</label>

            <label class="col-sm-8">{{ $user->name }}</label>
          </div>

          <div class="form-group">
            <lable class="col-sm-2">職位</lable>

            <label class="col-sm-8">{{ $user->getRoleName() }}</label>
          </div>

          <div class="form-group">
            <lable class="col-sm-2">學制</lable>

            <div class="col-sm-8">
              @foreach($academies as $academy)
                <label class="checkbox-inline">
                  <input type="checkbox" name="permissions[]" value="{{ $academy->id }}" @if(in_array($academy->id, $academy_permissions)) checked @endif> {{ $academy->getAcademyName() }}
                </label>
              @endforeach
            </div>
          </div>

          <div align="center">
            <input class="btn btn-primary" type="submit" value="儲存">
          </div>
        </form>
    </div>
</div>
@endsection
