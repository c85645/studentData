@extends('layout.admin.master')

@section('html')
<div id="con">
  <h4><i class="fa fa-user" aria-hidden="true"></i>帳號管理-權限設定</h4>
  <table align="center">
    <tr>
      <th>年度</th>
      <td><select class="form-control">
          <option value="106">106</option>
          <option value="105">105</option>
          <option value="104">104</option>
          <option value="103">103</option></select></td>
      <td><a href="#"><i class="fa fa-search"></i></a></td>
    </tr>
  </table>
</div>

<div class="table-responsive">
  <table class="table table-striped" style="text-align: center;">
    <thead>
      <tr>
        <th rowspan="2" style="vertical-align: middle;">委員</th>
        <th colspan="10">權限</th>
      </tr>
      <tr>
        <th>學程</th>
        <th>學士後</th>
        <th>碩士(考)</th>
        <th>碩士(甄)</th>
        <th>碩專</th>
        <th>轉學</th>
        <th>轉系</th>
        <th>輔系</th>
        <th>雙主修</th>
        <th>功能</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>閔慈</td>
        <td>V</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>V</td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
      </tr>
      <tr>
        <td>胡梨</td>
        <td></td>
        <td>V</td>
        <td></td>
        <td></td>
        <td>V</td>
        <td></td>
        <td>V</td>
        <td></td>
        <td></td>
        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
      </tr>
      <tr>
        <td>阿寬</td>
        <td></td>
        <td></td>
        <td>V</td>
        <td>V</td>
        <td></td>
        <td></td>
        <td></td>
        <td>V</td>
        <td>V</td>
        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
      </tr>
    </tbody>
  </table>
  <span class="pagebanner">共 3 筆資料。</span><span class="pagelinks"></span>
</div>
@endsection
