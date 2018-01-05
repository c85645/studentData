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
    <li class="active">{{ $teacher->name }}</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <button class="btn btn-warning btn-lg" onclick="history.back();"><i class="fa fa-arrow-left"></i></button>
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>准考證號碼</th>
    @foreach ($score_items as $key => $items)
      <th>評分項目{{ $key+1 }}</th>
    @endforeach
    {{-- <th>評分項目一</th>
    <th>評分項目二</th>
    <th>評分項目三</th>
    <th>評分項目四</th> --}}
    <th>總分</th>
    <th>評分時間</th>
  </thead>
  <tbody>
    @foreach ($applicants as $applicant)
    <tr>
      <td>{{ $applicant->name }}</td>
      <td>{{ $applicant->exam_number }}</td>
      @if (count($applicant->scores) > 0)
        @foreach ($applicant->scores as $score)
          @if ($score->score != null)
            <td>{{ $score->score }}</td>
          @endif
        @endforeach
      @else
        @for ($i = 0; $i < 4; $i++)
          <td></td>
        @endfor
      @endif
      <td>{{ $applicant->sum }}</td>
      <td>{{ $applicant->score_time }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
