@extends('layout.admin.master')

@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin/') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">學制管理</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header">學制管理</h2>
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-4 col-xs-4">
    <table>
      <thead>
        <tr>
          <th>年度：</th>
          <th>
            <select id="year" name="year">
              @foreach($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
              @endforeach
            </select>
          </th>
        </tr>
        <tr>
          <th>學制：</th>
          <th>
            <select id="examType" name="examType">
              <option value="A">轉學</option>
              <option value="B">轉系</option>
              <option value="C">雙主修</option>
              <option value="D">輔系</option>
              <option value="E">學士後</option>
              <option value="G">學程</option>
              <option value="H">碩士(考試)</option>
              <option value="I">碩士(甄試)</option>
              <option value="J">碩專</option>
            </select>
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<table class="table table-bordered table-hover table-middle">
  <thead>
    <th width="20%">年度</th>
    <th width="60%">學制</th>
    <th width="20%">操作</th>
  </thead>
  <tbody>
    <tr>
      <td>106</td>
      <td>轉學</td>
      <td><button class="btn btn-danger" type="submit" name=""><i class="fa fa-trash"></i>刪除</button></td>
    </tr>
  </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
  // $(function(){
  //   ajaxGetYears();
  // });

  // function ajaxGetYears(){
  //   $.ajax({
  //       type: "GET",
  //       url: '/ajaxQueryYears',
  //       success: function(data){
  //         ajaxGetYearsSuccess(data);
  //       }
  //   });
  // }

  // function ajaxGetYearsSuccess(data){
  //   if(data != null && data != undefined){
  //     $("#year").children().remove();
  //     for(var i=0;i<data.length;i++){
  //       $("#year")[0].options.add(new Option(data[i].year,data[i].year));
  //     }
  //   }
  // }
</script>
@endsection
