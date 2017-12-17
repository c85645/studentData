@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制管理</li>
    <li class="active">學年度設定</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">學年度設定</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-6">
    <div class="panel panel-info">
      <div class="panel-heading">設定系統學年度</div>
      <div class="panel-body">
        <form class="form-group" action="{{ url('studentData/admin/academyYear/edit') }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <table class="table table-hover table-middle">
            <thead>
              <th width="50%">年度</th>
              <th width="50%"></th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
                <tr>
                  <td>{{ $row->year }}</td>
                  <td><input type="radio" name="thisYear" value="{{ $row->year }}" @if ($row->year == $now->year) checked @endif></td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div align="center">
             <input class="btn btn-primary" type="submit" value="儲存">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-xs-6">
    <div class="panel panel-info">
      <div class="panel-heading">新增/刪除學年</div>
      <div class="panel-body">
        <form id="submit_form" class="form-inline" action="{{ url('studentData/admin/academyYear/update') }}" method="post">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <input type="hidden" id="action" name="action">
          <p style="color:red;">*學制評分項目預設帶最大學年度之設定</p>
          <div class="form-group">
            <div class="col-sm-4">
               <input type="text" name="inputYear" class="form-control"  placeholder="請輸入學年度" maxlength="3" onkeyup="enterNum(this);" value="{{ old('inputYear') }}">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-lg" type="button" onclick="doInsert();"><i class="fa fa-plus"></i></button>
          </div>
          <div class="form-group">
            <button class="btn btn-danger btn-lg" type="button" onclick="doDelete();"><i class="fa fa-trash"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('layout.common.errors')
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }
  });

  function doInsert() {
    $("#action").val("insert");
    $("#submit_form").submit();
  }

  function doDelete() {
    $("#action").val("delete");
    $("#submit_form").submit();
  }
</script>
@endsection
