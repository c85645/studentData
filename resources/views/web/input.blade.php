@extends('layout.web.master')

@section('html')
<nav class="gtco-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div id="gtco-logo"><a href="{{ url('studentData') }}"><img src="{{ asset('images/depart_logo.png') }}" width="70px" height="20px"> 東吳巨資報名系統</a></div>
      </div>
      <div align="right">
        <ul>
          <li><a href="{{ url('studentData') }}">首頁</a></li>
          <li class="btn-cta"><a href="http://bigdata.scu.edu.tw" target="_blank"><span>東吳巨資官網</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<section id="gtco-practice-areas" data-section="practice-areas">
  <div class="container">

    <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
      <h1>碩士甄試報名</h1>
      <p class="sub">報名截止時間：2017.12.31</p>
    </div>

    <div class="row" align="center">
      <div class="col-md-6 col-md-push-3 animate-box">
        <form action="#" method="post">
          <div class="form-group">
            <label class="sr-only">姓名</label>
            <input type="text" class="form-control" placeholder="姓名" minlength="2" maxlength="10" required>
          </div>
          <div class="form-group">
            <label class="sr-only">手機</label>
            <input type="text" class="form-control" placeholder="手機" maxlength="10" required onkeyup="enterNum(this);">
          </div>
          <div class="form-group">
            <label class="sr-only">信箱</label>
            <input type="email" class="form-control" placeholder="信箱" maxlength="30" required>
          </div>
          <div class="form-group">
            <label class="sr-only">身分證後六碼</label>
            <input type="text" class="form-control" placeholder="身分證後六碼" maxlength="6" required onkeyup="enterNum(this);">
          </div>
          <div class="form-group">
            <label class="sr-only">上傳資料</label>
            <input type="file" class="form-control" placeholder="PDF上傳" accept=".pdf,application/pdf" required>
          </div>
          <div class="form-group">
            <input type="submit" value="確認送出" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
