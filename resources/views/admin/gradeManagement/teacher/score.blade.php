@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/studentData/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-sm-12">
    <h3>評分項目</h3>
  </div>
  <div class="col-sm-12">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">評分項目（XX%）</label>
      <div class="col-sm-10">
        <input type="text" class="form-control-plaintext" value="輸入框">
      </div>
    </div>
    <div class="col-sm-12">
      <p style="color:red;">請按比例評分，四項加總，滿分 100</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <label class="col-sm-2">姓名：</label>
      <label class="col-sm-2">傑夫</label>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2">現職公司：</label>
      <label class="col-sm-2">紅葉</label>
      <label class="col-sm-2">職位：</label>
      <label class="col-sm-2">應用工程師</label>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2">最高學歷：</label>
      <label class="col-sm-2">大學</label>
      <label class="col-sm-2">系：</label>
      <label class="col-sm-2">資管系</label>
      <label class="col-sm-2">學位：</label>
      <label class="col-sm-2">輔大學士</label>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2">工作年資（年/月）：</label>
      <label class="col-sm-2">三年囉</label>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2">證照：</label>
      <label class="col-sm-2">甲級以及丙級</label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <object class="col-sm-12" id="pdfObject" data="{{ $filePath }}" type="application/pdf"></object>
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(function(){
    // 設定pdf預覽大小
    $(window).bind('resize', function() {
      var width = $(window).width();
      $("#pdfObject").width(width - $("#sidebar-collapse").width() - 40).height(width/2.5);
    }).trigger('resize');

    // var width = $(window).width();
    // $("#pdfObject").width(width/1.25).height(width/4);
  });
</script>
@endsection
