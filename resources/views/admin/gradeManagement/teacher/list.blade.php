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
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <input class="btn btn-info" type="button" value="匯出Excel">
      <label class="pull-right">評分截止日期：{{ $academy->score_edate }}</label>
    </div>
  </div>
</div>

<table class="table table-bordered table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>准考證號碼</th>
    <th>查看個資評分</th>
    @foreach ($academy->scoreItems as $item)
      <th>{{ $item->name }}</th>
    @endforeach
  </thead>
  <tbody>
    @foreach ($applicants as $applicant)
      <form action="{{ route('applicant.score') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
        <tr>
          <td>{{ $applicant->name }}</td>
          <td>{{ $applicant->exam_number }}</td>
          <td><button class="btn btn-default" type="submit">查看備審資料＆評分</button></td>
          @foreach ($applicant->scores as $score)
            @if ($score->score != null)
              <td>{{ $score->score }}</td>
            @endif
          @endforeach
        </tr>
      </form>
    @endforeach
  </tbody>
</table>
@endsection
