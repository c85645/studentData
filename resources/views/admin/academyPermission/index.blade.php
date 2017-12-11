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
    <h2 class="page-header">學制權限管理</h2>
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
                <option value="{{ $option }}">{{ $option }}</option>
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
      <th rowspan="2">帳號</th>
      <th rowspan="2">職位</th>
      <th colspan="10">學制</th>
    </tr>
    <tr>
      <th>轉學</th>
      <th>轉系</th>
      <th>雙主修</th>
      <th>輔系</th>
      <th>學士後</th>
      <th>學程</th>
      <th>碩士（考試）</th>
      <th>碩士（甄試）</th>
      <th>碩專</th>
      <th>功能</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
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
        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
      </tr>
    @endforeach
  </tbody>
</table>
{{-- {!! $users->render() !!} --}}
@endsection
