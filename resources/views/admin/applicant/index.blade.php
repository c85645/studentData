@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">申請人資料管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">申請人資料管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-4">
    <form class="form-horizontal" method="get" action="{{ route('applicant.search') }}">
      <table>
        <tr>
          <th>年度：</th>
          <th>
            <select id="year" name="year" class="form-control">
              @foreach($years as $year)
                <option value="{{ $year }}" @if($year == $option) selected @endif>{{ $year }}</option>
              @endforeach
            </select>
          </th>
        </tr>
        <tr>
          <th>學制：</th>
          <th>
            <select name="academy_type" class="form-control">
              @foreach ($academies as $academy)
                <option value="{{ $academy->id }}">{{ $academy->name }}</option>
              @endforeach
            </select>
          </th>
        </tr>
        <tr>
          <th>資料：</th>
          <th>
            <select name="data_type" class="form-control">
              <option value="1">前台表單</option>
              <option value="2">繳交紙本</option>
              <option value="3">報名完成</option>
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
