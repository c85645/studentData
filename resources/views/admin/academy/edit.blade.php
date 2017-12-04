@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name }}</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header">學制管理</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-danger">
      <div class="panel-heading">權限設定<span class="pull-right clickable panel-toggle panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
      <div class="panel-body" style="display: none;">
        <div class="canvas-wrapper main-chart">
          <form>
            <table class="table">
              <thead>
                <th width="50%">col1</th>
                <th width="50%">col2</th>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="text1" class="form-control"></td>
                  <td><input type="text" name="text1" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>

    <div class="panel panel-success">
      <div class="panel-heading">評分標準<span class="pull-right clickable panel-toggle panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
      <div class="panel-body" style="display: none;">
        <div class="canvas-wrapper main-chart">
          <form>
            <table class="table ">
              <thead>
                <th width="50%">col1</th>
                <th width="50%">col2</th>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="text1" class="form-control"></td>
                  <td><input type="text" name="text1" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>

     <div class="panel panel-warning">
      <div class="panel-heading">起迄時間<span class="pull-right clickable panel-toggle panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
      <div class="panel-body" style="display: none;">
        <div class="canvas-wrapper main-chart">
          <form>
            <table class="table ">
              <thead>
                <th width="50%">col1</th>
                <th width="50%">col2</th>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="text1" class="form-control"></td>
                  <td><input type="text" name="text1" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
