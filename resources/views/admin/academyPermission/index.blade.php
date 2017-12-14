@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制權限管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">學制權限管理</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-5">
    <form class="input-group form-group" method="GET" action="/admin/academyPermission">
      <table>
        <tr>
          <th>年度：</th>
          <th>
            <select id="year" name="year" class="form-control">
              @foreach($options as $option)
                <option value="{{ $option }}" @if($year == $option) selected @endif>{{ $option }}</option>
              @endforeach
            </select>
          </th>
          <th><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></th>
        </tr>
      </table>
    </form>
  </div>
</div>

<table class="table table-striped table-middle">
  <thead>
    <tr>
      <th rowspan="2" width="5%">帳號</th>
      <th rowspan="2" width="5%">職位</th>
      <th colspan="10">學制</th>
    </tr>
    <tr>
      <th width="5%">轉學</th>
      <th width="5%">轉系</th>
      <th width="5%">雙主修</th>
      <th width="5%">輔系</th>
      <th width="5%">學士後</th>
      <th width="5%">學程</th>
      <th width="5%">碩士（考試）</th>
      <th width="5%">碩士（甄試）</th>
      <th width="5%">碩專</th>
      <th width="5%">功能</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <form action="/admin/academyPermission/edit" method="get">
      <input type="hidden" name="year" value="{{ $year }}">
      <input type="hidden" name="user_id" value="{{ $user->id }}">
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->getRoleName() }}</td>
        <td>@if(in_array('A', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('B', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('C', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('D', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('E', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('F', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('G', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('H', $user->getAcademyPermission($year))) V @endif</td>
        <td>@if(in_array('I', $user->getAcademyPermission($year))) V @endif</td>
        <td><button class="btn btn-success" type="submit"><i class="fa fa-pencil"></i></button></td>
      </tr>
      </form>
    @endforeach
  </tbody>
</table>
{{-- {!! $users->render() !!} --}}
@endsection
