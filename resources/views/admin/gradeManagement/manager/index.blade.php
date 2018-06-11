@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-4">
    <form class="form-horizontal" method="get" action="{{ route('manager.search') }}">
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
              <option value="{{ $academy->id }}" @if($academy->id == $academy_type) selected @endif>{{ $academy->name }}</option>
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
@include('layout.common.errors')
@endsection
