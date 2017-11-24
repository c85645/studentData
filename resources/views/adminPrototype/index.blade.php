@extends('layout.admin.master')

@section('html')
<h1>歡迎使用！</h1>

<section class="row text-center placeholders">
  <h4>第一個區塊</h4>
</section>

<h2>範例表格查詢結果</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Header</th>
        <th>Header</th>
        <th>Header</th>
        <th>Header</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1,001</td>
        <td>Lorem</td>
        <td>ipsum</td>
        <td>dolor</td>
        <td>sit</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
