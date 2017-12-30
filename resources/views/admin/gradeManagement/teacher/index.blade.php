@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">考委評分管理</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <h2>{{ Auth::user()->name }}，您好！</h2>
  </div>
</div>
<div class="row">
  @if (count($academies) != 0)
    @foreach ($academies as $academy)
    <div class="col-sm-12">
      <h4>距離 {{ $academy->year }} 學年，{{ $academy->name }} 的評分截止時間： {{ $academy->leftTime }}</h4>
    </div>
    @endforeach
  @else
    <div class="col-sm-12">尚未負責學制</div>
  @endif
</div>
<div class="form-group">
  <form id="action_form" action="{{ route('teacher.list') }}" method="get">
    @foreach ($academies as $academy)
      @if ($academy->status)
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="radio_button" value="{{ $academy->id }}"> {{ $academy->name }}
          </label>
        </div>
      @endif
    @endforeach
  </form>
  <div>
    @if (count($academies) != 0)
      <input class="btn btn-info" type="button" value="開始評分GO" onclick="goSubmit();">
    @endif
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  function goSubmit() {
    if(checkCol()){
      $("#action_form").submit();
    }
  }

  function checkCol() {
    var isPass = true;
    if($('input:radio:checked[name="radio_button"]').val() == undefined) {
      alert("請選擇要評分的學制！")
      isPass = false;
      return isPass;
    }
    return isPass;
  }
</script>
@endsection
