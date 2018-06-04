@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name->name }}</li>
  </ol>
</div>
<div class="row">
  <form id="action_form" action="{{ route('teacher.store') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
    <div class="col-sm-12">
      <label class="col-sm-2">評分項目</label>
      <div class="pull-right">
        <a class="btn btn-warning btn-sm" href="{{ route('teacher.list') }}" role="button"><i class="fa fa-arrow-left"></i></a>
        <input class="btn btn-primary btn-sm" type="submit" value="送出">
      </div>
    </div>
    <div class="col-sm-12">
      @foreach ($score_items as $item)
        <div class="form-group">
          <label class="col-sm-3">{{ $item->name .' ('.$item->percent.'%)'}}</label>
          <div class="col-sm-9">
            <input name="score[]" type="number" max="{{ $item->percent }}" min="0" required>
          </div>
        </div>
      @endforeach
      <div class="col-sm-12">
        <p style="color:red;">請按比例評分，四項加總，滿分 100</p>
      </div>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2">姓名：</label>
      <label class="col-sm-2">{{ $applicant->name }}</label>
      <label class="col-sm-2">准考證號碼：</label>
      <label class="col-sm-2">{{ $applicant->exam_number }}</label>
    </div>
  </form>
  <div class="col-sm-12">
    @if ($filePath != null || $filePath != '')
      <object class="col-sm-12" id="pdfObject" data="{{ $filePath }}" type="application/pdf"></object>
    @else
    <div align="center">
      <h3>查無該應徵者的pdf，請確認是否有填錯以下兩張表的身分證欄位</h3>
      <h3>1.前台輸入資料</h3>
      <h3>2.後台匯入資料</h3>
    </div>
    @endif
  </div>
</div>
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
</script>
@endsection
