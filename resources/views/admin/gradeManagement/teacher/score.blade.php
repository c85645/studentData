@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name->name }}</li>
  </ol>
</div>
<div class="row">
  <div class="col-sm-12">
    <label class="col-sm-2">姓名：</label>
    <label class="col-sm-2">{{ $applicant->name }}</label>
    <label class="col-sm-2">准考證號碼：</label>
    <label class="col-sm-2">{{ $applicant->exam_number }}</label>
  </div>
</div>
<div class="row">
  <form id="action_form" action="{{ url('studentData/admin/gradeManagement/store') }}" method="post">
    {{ csrf_field() }}
    <div class="col-sm-12">
      <label class="col-sm-2">評分項目</label>
      <div class="pull-right">
        <input class="btn btn-dark btn-sm" type="button" value="回上一頁" onclick="goBack();">
        <input class="btn btn-primary btn-sm" type="submit" value="送出">
      </div>
    </div>
    <div class="col-sm-12">
      @foreach ($score_items as $item)
        <div class="form-group">
          <label class="col-sm-3">{{ $item->name .'('.$item->percent.'%)'}}</label>
          <div class="col-sm-9">
            <input name="score[]" type="number" max="{{ $item->percent }}" required>
          </div>
        </div>
      @endforeach
      <div class="col-sm-12">
        <p style="color:red;">請按比例評分，四項加總，滿分 100</p>
      </div>
    </div>
  </form>
  <div class="col-sm-12">
    <object class="col-sm-12" id="pdfObject" data="{{ $filePath }}" type="application/pdf"></object>
  </div>
</div>
<form id="go_back_form" action="{{ url('studentData/admin/gradeManagement/list') }}" method="post">
  {{ csrf_field() }}
</form>
@endsection
@section('javascript')
<script type="text/javascript">
  $(function(){
    // 設定pdf預覽大小
    $(window).bind('resize', function() {
      var width = $(window).width();
      $("#pdfObject").width(width - $("#sidebar-collapse").width() - 60).height(width/2.5);
    }).trigger('resize');
  });

  function goBack(){
    $("#go_back_form").submit();
  }
</script>
@endsection
