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
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <a class="btn btn-warning btn-lg" href="{{ route('gradeManagement.index') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-4">
    <form class="form-horizontal" method="post" action="{{ route('manager.result') }}">
      {{ csrf_field() }}
      <table>
        <tr>
          <th>資料：</th>
          <th>
            <select id="teacher_id" name="teacher_id" class="form-control">
              <option value="total">總成績</option>
              @foreach($academy->teachers as $teacher)
                @if (!$teacher->isManager())
                  <option value="{{ $teacher->id }}" @if($teacher->id == session('teacher_id')) selected @endif>{{ $teacher->name }}</option>
                @endif
              @endforeach
            </select>
          </th>
        </tr>
        <tr>
          <th></th>
          <th>
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </th>
        </tr>
      </table>
    </form>
  </div>
</div>
@endsection
