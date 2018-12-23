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
    <div class="pull-left">
      <a class="btn btn-warning btn-lg" href="{{ route('manager.search') }}" role="button"><i class="fa fa-arrow-left"></i></a>
    </div>
    <div class="pull-right">
      <form action="{{ route('export.personal') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
        <input type="hidden" name="academy_id" value="{{ $academy->id }}">
        <button class="btn btn-info btn-lg" type="submit">評審委員成績確認表</button>
      </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    @if ($academy->name_id == 'H' || $academy->name_id == 'I' || $academy->name_id == 'J')
      <div class="pull-left">
        <h4>申請人第一階段總成績</h4>
      </div>
    @endif
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>姓名</th>
    <th>准考證號碼</th>
    @foreach ($score_items as $key => $items)
      <th>評分項目{{ $key+1 }}</th>
    @endforeach
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
        @if (count($applicant->scores) < count($score_items))
          @for ($i = 0; $i < (count($score_items) - count($applicant->scores)); $i++)
            <td></td>
          @endfor
        @endif
      @else
        @for ($i = 0; $i < count($score_items); $i++)
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
