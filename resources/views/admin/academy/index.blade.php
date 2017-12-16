@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">學制管理</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-5 col-xs-5">
    <form class="input-group form-group" method="GET" action="/studentData/admin/academy">
      <table>
        <thead>
          <tr>
            <th>年度：</th>
            <th>
              <select id="year" name="year" class="form-control">
                @foreach($years as $year)
                  <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
              </select>
            </th>
            <th><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></th>
          </tr>
        </thead>
      </table>
    </form>
  </div>
  <div class="col-xs-2">
    <a class="btn btn-info" href="{{ url('/studentData/admin/academyYear') }}"><i class="fa fa-pencil">學年度設定</i></a>
  </div>
</div>

<table class="table table-bordered table-hover table-middle">
  <thead>
    <th width="20%">年度</th>
    <th width="60%">學制</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    @foreach ($rows as $academy)
    <tr>
      <td>{{ $academy->year }}</td>
      <td>{{ $academy->name }}</td>
      <td><a class="btn btn-success" href="/studentData/admin/academy/{{ $academy->id }}/edit"><i class="fa fa-pencil"> </i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $rows->render() !!}
@endsection
