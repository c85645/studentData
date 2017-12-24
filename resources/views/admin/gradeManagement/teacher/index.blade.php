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
  @foreach ($academies as $academy)
  <div class="col-sm-12">
    <h4>距離 {{ $academy->year }} 學年，{{ $academy->name }} 的評分截止時間還有 {{ $academy->pdf_url }}</h4>
  </div>
  @endforeach
</div>
<div class="form-group">
  @foreach ($academies as $academy)
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input class="form-check-input" type="radio" name="redioOption[]" value="{{ $academy->id }}"> {{ $academy->name }}
    </label>
  </div>
  @endforeach
</div>
<button class="btn btn-info" type="button">開始評分GO</button>
@endsection
