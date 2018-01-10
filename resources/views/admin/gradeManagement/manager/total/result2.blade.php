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
    <li class="active">總成績</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">考委評分管理</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <a class="btn btn-warning btn-lg" href="{{ route('manager.search') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
</div>
@include('layout.common.errors')
<div class="row">
  <div class="col-xs-12">
    <div class="pull-left">
      <h4>申請人第一階段總成績</h4>
    </div>
    <div class="pull-right">
      <button class="btn btn-info btn-lg">書面資料審查評分總表</button>
      <form action="{{ route('export.interviewExcel') }}" method="POST" style="margin:0px; display:inline;">
        {{ csrf_field() }}
        <input type="hidden" name="academy_id" value="{{ $academy->id }}">
        <button class="btn btn-info btn-lg" type="submit">面試評分表</button>
      </form>
    </div>
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>准考證號碼</th>
    @foreach ($score_items as $key => $items)
      <th>評分項目{{ $key+1 }}平均</th>
    @endforeach
    <th>總分</th>
    <th>是否通過</th>
    <th>操作</th>
  </thead>
  <tbody>
    @foreach ($applicants as $applicant)
    <tr>
      <td>{{ $applicant->name }}</td>
      <td>{{ $applicant->exam_number }}</td>
      @if (count($applicant->avg) > 0)
        @foreach ($applicant->avg as $score)
          @if ($score->average != null)
            <td>{{ number_format($score->average, 2) }}</td>
          @endif
        @endforeach
      @else
        @for ($i = 0; $i < count($score_items); $i++)
          <td></td>
        @endfor
      @endif
      <td>{{ number_format($applicant->sum, 2) }}</td>
      <td>
        @if ($applicant->is_pass)
          <p style="color: blue;">通過</p>
        @else
          <p style="color: red;">不通過</p>
        @endif
      </td>
      <td><a class="btn btn-success" href="/studentData/admin/gradeManagement/manager/{{ $applicant->id }}/editIsPass"><i class="fa fa-pencil"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-lg-12">
    <div class="pull-left">
      <h4>申請人第一、二階段成績</h4>
    </div>
    <div class="pull-right">
      <button class="btn btn-info btn-lg">一階二階成績審查總表</button>
      <a class="btn btn-success btn-lg" href="{{ route('manager.edit') }}" role="button">輸入第二階段成績</a>
    </div>
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>准考證號碼</th>
    <th>一階總分</th>
    <th>二階總分</th>
  </thead>
  <tbody>
    @foreach ($applicants2 as $applicant)
      <tr>
        <td>{{ $applicant->name }}</td>
        <td>{{ $applicant->exam_number }}</td>
        <td>{{ number_format($applicant->sum, 2) }}</td>
        <td>{{ number_format($applicant->step2_score, 2) }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
