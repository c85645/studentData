@extends('layout.admin.master')

@section('html')
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/') }}">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">首頁</li>
      </ol>
    </div><!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header">歡迎使用東吳大學巨量資料學院後台管理系統</h2>
      </div>
    </div><!--/.row-->

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            This is a panel-heading
            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
          </div>
          <div class="panel-body">
            <div class="canvas-wrapper main-chart">
              {{-- <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas> --}}
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
    </div><!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h2>Alerts</h2>
        <div class="alert bg-danger" role="alert">
          <em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close" data-dismiss="alert" aria-label="Close"></em></a>
        </div>
      </div>
    </div><!--/.row-->
@endsection
