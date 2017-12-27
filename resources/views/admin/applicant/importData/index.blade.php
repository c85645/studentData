@extends('layout.admin.master')
@section('html')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ route('main') }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">申請人資料管理</li>
    <li class="active">{{ $academy->year }} 學年度</li>
    <li class="active">{{ $academy->name->name }}</li>
    <li class="active">繳交紙本</li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">繳交紙本</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
    <a class="btn btn-primary btn-lg" href="{{ route('importData.create') }}" role="button"><i class="fa fa-plus"></i></a>
    <a class="btn btn-warning btn-lg" href="{{ route('applicant.index') }}" role="button"><i class="fa fa-arrow-left"></i></a>
  </div>
  <div class="col-xs-offset-4 col-xs-4">
    <form class="input-group form-group" method="GET" action="{{ route('applicant.search') }}">
      <input name="keyword" type="text" class="form-control" placeholder="請輸入姓名" value="{{ $keyword }}">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </form>
  </div>
</div>
<table class="table table-hover table-middle">
  <thead>
    <th>准考證號碼</th>
    <th>姓名</th>
    <th>性別</th>
    <th>畢業學校</th>
    <th>畢業學系</th>
    <th>同等學歷與否</th>
    <th>身份別</th>
    <th>畢業學校類別</th>
    <th>生日</th>
    <th>身分證字號</th>
    <th>地址</th>
    <th>手機</th>
    <th>信箱</th>
    <th>匯入時間</th>
    <th>是否通過第一階段</th>
    <th>功能</th>
  </thead>
  <tbody>
    @foreach($import_applicants as $applicant)
    <tr>
      <td>{{ $applicant->exam_number }}</td>
      <td>{{ $applicant->name }}</td>
      <td>
        @if ($applicant->gender == 1)
          男
        @elseif ($applicant->gender == 2)
          女
        @else
          資料有誤
        @endif
      </td>
      <td>{{ $applicant->graduated_school }}</td>
      <td>{{ $applicant->graduated_department }}</td>
      <td>{{ $applicant->equivalent_qualifications }}</td>
      <td>{{ $applicant->identity }}</td>
      <td>{{ $applicant->graduated_school_classification }}</td>
      <td>{{ $applicant->birth }}</td>
      <td>{{ $applicant->personal_id }}</td>
      <td>{{ $applicant->address }}</td>
      <td>{{ $applicant->mobile }}</td>
      <td>{{ $applicant->email }}</td>
      <td>{{ $applicant->import_time }}</td>
      <td>
        @if ($applicant->is_pass == 1)
          通過
        @else
          不通過
        @endif
      </td>
      <td>
        <form class="form-inline" method="post" action="/studentData/admin/applicant/importData/{{ $applicant->id }}">
          <a class="btn btn-success" href="/studentData/admin/applicant/importData/{{ $applicant->id }}/edit"><i class="fa fa-pencil"> </i></a>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <button class="btn btn-danger" type="submit" name=""><i class="fa fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $import_applicants->render() !!}
@endsection
