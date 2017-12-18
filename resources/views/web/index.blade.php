@extends('layout.web.master')

@section('html')
<nav class="gtco-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div id="gtco-logo"><a href="{{ url('/studentData/') }}"><img src="{{ asset('images/depart_logo.png') }}" width="70px" height="20px"> 東吳巨資報名系統</a></div>
      </div>
      <div class="col-xs-6 text-right menu-1 main-nav">
        <ul>
          <li class="active"><a href="#" data-nav-section="home">首頁</a></li>
          <li><a href="#" data-nav-section="practice-areas">加入我們</a></li>
          <li><a href="#" data-nav-section="contact">聯絡我們</a></li>
        </ul>
      </div>
      <div class="col-xs-2">
        <ul>
          <li class="btn-cta"><a href="http://bigdata.scu.edu.tw" target="_blank"><span>東吳巨資官網</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<section id="gtco-hero" class="gtco-cover" style="background-image: url({{ asset('images/bg1.jpeg') }});"  data-section="home"  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-0 text-center">
        <div class="display-t">
          <div class="display-tc">
            <h1 class="animate-box" data-animate-effect="fadeIn" style="font-weight: 500;">你知道巨量資料在學什麼嗎？</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gtco-practice-areas" data-section="practice-areas">
  <div class="container">
    <div class="row row-pb-md">
      <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
        <h1>加入我們</h1>
        <p class="sub">心動不如馬上行動，走過路過千萬不要錯過。</p>
        <p class="subtle-text animate-box" data-animate-effect="fadeIn">BIG <span>Data</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/graduate.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>碩士甄試</h3>
            <br>
            <div class="col-md-12">
              <p>報名截止日期：2018.03.25</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/id-card.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>碩士在職專班</h3>
            <br>
            <div class="col-md-12">
              <p>報名截止日期：2018.05.27</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/writing.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>轉系考試</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/library.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>雙主修</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/lecture.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>學士後</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/ereader-1.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>碩士考試</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/ereader.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>轉學考試</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/chat.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>輔系</h3>
            <br>
            <div class="col-md-12">
              <p>報名截止日期：2018.04.12</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/learning.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>學程</h3>
            <br>
            <div class="col-md-12">
              <p>尚未開始報名</p>
            </div>
            <div class="col-md-5">
              <a href="http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf" target="_blank">
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              <a href="{{ url('studentData/input') }}">
                <button class="button" ><span>點我報名</span></button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gtco-contact" data-section="contact">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
      <h1>聯絡我們</h1>
      <p class="sub">有問題歡迎私訊東吳巨資Facebook粉絲專頁</p>
      <p class="subtle-text animate-box" data-animate-effect="fadeIn">Contact</p>
    </div>
    <div class="row">
      <div class="col-md-5 col-md-push-6 animate-box">
        <div class="gtco-contact-info">
          <ul>
            <li class="fax">02-2880-3947</li>
            <li class="url"><a href="http://bigdata.scu.edu.tw" target="_blank">東吳巨資官網</a></li>
            <li class="address">台北市士林區臨溪路70號【東吳大學外雙溪校區】</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-md-push-6"></div>
      <div class="col-md-4 col-md-pull-6 animate-box">
        <div class="gtco-contact-info">
          <ul>
            <li class="phone">02-2881-9471 轉 5932~5935</li>
            <li class="email">bigdata@gm.scu.edu.tw</li>
            <li class="facebook"><a href="https://www.facebook.com/scubigdata/" target="_blank">東吳巨資粉絲專頁</a></li>
            <li class="user">星期一至五 8:30~17:00</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
