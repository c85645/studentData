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
  <div class="col-lg-12">
    <table align="center">
      <tr>
        <th>學年度：</th>
        <td><select>
            <option value="106">106</option>
            <option value="105">105</option>
            <option value="104">104</option>
            <option value="103">103</option></select></td>
        <td>&nbsp;<a href="#"><i class="fa fa-search"></i></a></td>
      </tr>
    </table>
  </div>
</div>

<table class="table table-striped table-middle">
  <thead>
    <tr>
      <th rowspan="2"">委員</th>
      <th colspan="10">權限</th>
    </tr>
    <tr>
      <th>學程</th>
      <th>學士後</th>
      <th>碩士(考)</th>
      <th>碩士(甄)</th>
      <th>碩專</th>
      <th>轉學</th>
      <th>轉系</th>
      <th>輔系</th>
      <th>雙主修</th>
      <th>功能</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>閔慈</td>
      <td>V</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>V</td>
      <td></td>
      <td></td>
      <td></td>
      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
    </tr>
  </tbody>
</table>
<span class="pagebanner">共 3 筆資料。</span><span class="pagelinks"></span>
@endsection
