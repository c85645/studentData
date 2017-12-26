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
        <br><br><br>
        <h1>感謝您的報名</h1>
        <p class="sub">再次提醒您，記得完成紙本的繳交才算完成報名手續呦</p>
      </div>
      
    </div>
    <div align="center">
      <a href="index.html">
        <button class="button3">回首頁</button>
      </a>
    </div>
</section>
@endsection
