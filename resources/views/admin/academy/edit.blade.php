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

<form id="action_form" method="post" action="/admin/academy/{{ $academy->id }}">
  <div class="row">
    <div class="col-md-12">
      {{ method_field('put') }}
      {{ csrf_field() }}
      <div class="panel panel-danger">
        <div class="panel-heading">權限設定<span class="pull-right clickable panel-toggle {{-- panel-collapsed --}}"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <div class="canvas-wrapper main-chart">
            <table class="table table-middle">
              <thead>
                {{-- <th width="30%">帳號</th>
                <th width="50%">權限</th>
                <th width="20%">操作</th> --}}
              </thead>
              <tbody>
                {{-- <tr>
                  <td><input type="text" name="text1" class="form-control"></td>
                  <td><input type="text" name="text1" class="form-control"></td>
                  <td><input type="text" name="text1" class="form-control"></td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="panel panel-success">
        <div class="panel-heading">評分標準<span class="pull-right clickable panel-toggle {{-- panel-collapsed --}}"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <div class="canvas-wrapper main-chart">
            <table class="table table-middle">
              <div align="right">
                <button type="button" class="btn btn-success" onclick="addCol();"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-danger" onclick="delCol();"><i class="fa fa-minus"></i></button>
              </div>
              <thead>
                <th width="60%">評分項目</th>
                <th width="40%">比重(%)</th>
              </thead>
              <tbody id="tbody">
                @foreach($score_items as $item)
                  <tr>
                    <td><input type="text" name="dataList[name][]" maxlength="10" class="form-control" value="{{ $item->name }}"/></td>
                    <td><input type="text" name="dataList[percent][]" maxlength="3" class="form-control" value="{{ $item->percent }}" onkeyup="enterDigital(this);"/></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="panel panel-warning">
        <div class="panel-heading">起迄時間<span class="pull-right clickable panel-toggle {{-- panel-collapsed --}}"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <div class="canvas-wrapper main-chart">
            <table class="table table-middle">
              <tbody>
                <tr>
                  <td>前台開放報名時間</td>
                  <td><input type="date" name="fill_out_sdate" class="form-control" value="{{ old('fill_out_sdate', $academy->fill_out_sdate) }}"></td>
                </tr>
                <tr>
                  <td>前台開放報名時間</td>
                  <td><input type="date" name="fill_out_edate" class="form-control" value="{{ old('fill_out_edate', $academy->fill_out_edate) }}"></td>
                </tr>
                <tr>
                  <td>考試委員評分開始時間</td>
                  <td><input type="date" name="score_sdate" class="form-control" value="{{ old('score_sdate', $academy->score_sdate) }}"></td>
                </tr>
                <tr>
                  <td>考試委員評分截止時間</td>
                  <td><input type="date" name="score_edate" class="form-control" value="{{ old('score_edate', $academy->score_edate) }}"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div align="center">
        <input class="btn btn-primary" type="button" value="儲存" onclick="goSubmit();">
      </div>
    </div>
  </div>
</form>
@endsection

@section("javascript")
<script type="text/javascript">
  $(function(){
    // 載入評分標準
  });

  function addCol() {
    var tbody = $("#tbody");
    if (tbody.length>0) {
      var trs = tbody.find("tr");
      if (trs.length == 5) {
        return;
      } else {
        var rowNum = trs.length;
        var inertTr = '<tr><td><input type="text" name="dataList[name][]" maxlength="10" class="form-control" /></td><td><input type="text" name="dataList[percent][]" maxlength="3" class="form-control" onkeyup="enterDigital(this);"/></td></tr>';
        if (trs.length == 0) {
          tbody.append(inertTr);
        } else {
          trs.last().after(inertTr);
        }
      }
    }
  }

  function delCol() {
    var trs = $("#tbody tr");
    if(trs.length > 0){
      trs.last().remove();
    }
  }

  function goSubmit() {
    if (checkCol()) {
      $("#action_form").submit();
    }
  }

  // 欄位檢核
  function checkCol() {
    var isPass = true;
    // 檢查有多少個評分標準，就幾個必填
    var sum = 0;
    $('input[name="dataList\[percent\]\[\]"]').each(function(index) {
        if($(this).val() == ''){
          // 檢查欄位是否輸入
          alert("「評分項目」或「比重」尚未全部輸入完畢哦！");
          isPass = false;
          return false;
        }
        sum += Number($(this).val());
    });

    if(Number(sum) != Number(100)){
        alert("比重總和需為100!");
        isPass = false;
        return false;
    }
    return isPass;
  }
</script>
@endsection
