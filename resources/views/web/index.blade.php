@extends('layout.web.master')

@section('html')
<!-- Counter -->
<script src="{{ asset('js/web/counter.js') }}"></script>
<nav class="gtco-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div id="gtco-logo"><a href="{{ url('/studentData/') }}"><img src="{{ asset('images/depart_logo.png') }}" width="70px" height="20px"> 東吳巨資報名系統</a></div>
      </div>
      <div class="col-xs-6 text-right menu-1 main-nav">
        <ul>
          <li class="active"><a href="#" data-nav-section="home">首頁</a></li>
          <li><a href="#" data-nav-section="about">招生資訊</a></li>
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

<section id="gtco-about" data-section="about">
    <div class="container">
      <div class="row row-pb-md">
        <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
          <h1>巨量資料管理學院 熱烈招生中</h1>
          <p class="sub">大家都在大數據，你還在等什麼？</p>
          <p class="subtle-text animate-box" data-animate-effect="fadeIn">Welcome</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
          <div class="img-shadow">
            <img src="{{ asset('images/p2.png') }}" class="img-responsive">
          </div>
        </div>
        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
          <h2 class="heading-colored">關於我們</h2>
          <p>由榮譽院長張善政領軍，搭配院裡六位不同領域的教授們，結合豐富的業界與學術資源，希望給予學員最優質的教學品質，培育出擁有數據處理力與商業洞察力的人才。
          <br><br>
          東吳巨量資料管理學院擁有九種不同學制，用心培養人才的地方，提供對資料科學領域有興趣或是任何想精進自己的人來就讀！</p>
          <p><a  href="http://bigdata.scu.edu.tw" target="_blank" class="read-more">了解更多 <i class="icon-chevron-right"></i></a></p>
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
              @if ($academyH->isOpen())
                <p>報名截止日期：{{ $academyH->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyH->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyH->pdf_url != '') href="{{ $academyH->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyH->isOpen())
                <button class="button" onclick="goInput('H');"><span>點我報名</span></button>
              @endif
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/id-card.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>碩士在職學位學程</h3>
            <br>
            <div class="col-md-12">
              @if ($academyI->isOpen())
                <p>報名截止日期：{{ $academyI->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyI->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyI->pdf_url != '') href="{{ $academyI->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyI->isOpen())
                <button class="button" onclick="goInput('I');"><span>點我報名</span></button>
              @endif
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
              @if ($academyB->isOpen())
                <p>報名截止日期：{{ $academyB->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyB->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyB->pdf_url != '') href="{{ $academyB->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyB->isOpen())
                <button class="button" onclick="goInput('B');"><span>點我報名</span></button>
              @endif
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
              @if ($academyC->isOpen())
                <p>報名截止日期：{{ $academyC->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyC->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyC->pdf_url != '') href="{{ $academyC->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyC->isOpen())
                <button class="button" onclick="goInput('C');"><span>點我報名</span></button>
              @endif
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
              @if ($academyE->isOpen())
                <p>報名截止日期：{{ $academyE->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyE->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyE->pdf_url != '') href="{{ $academyE->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyE->isOpen())
                <button class="button" onclick="goInput('E');"><span>點我報名</span></button>
              @endif
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
              @if ($academyG->isOpen())
                <p>報名截止日期：{{ $academyG->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyG->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyG->pdf_url != '') href="{{ $academyG->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if( $academyG->isOpen())
                <button class="button" onclick="goInput('G');"><span>點我報名</span></button>
              @endif
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
              @if ($academyA->isOpen())
                <p>報名截止日期：{{ $academyA->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyA->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyA->pdf_url != '') href="{{ $academyA->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyA->isOpen())
                <button class="button" onclick="goInput('A');"><span>點我報名</span></button>
              @endif
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
              @if ($academyD->isOpen())
                <p>報名截止日期：{{ $academyD->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyD->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyD->pdf_url != '') href="{{ $academyD->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyD->isOpen())
                <button class="button" onclick="goInput('D');"><span>點我報名</span></button>
              @endif
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
              @if ($academyF->isOpen())
                <p>報名截止日期：{{ $academyF->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyF->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyF->pdf_url != '') href="{{ $academyF->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyF->isOpen())
                <button class="button" onclick="goInput('F');"><span>點我報名</span></button>
              @endif
            </div>
          </div>
        </div>
        <br>
        <div class="gtco-practice-area-item animate-box">
          <div class="gtco-icon">
            <img src="{{ asset('images/png/workspace.png') }}" width="60px">
          </div>
          <div class="gtco-copy">
            <h3>學碩一貫</h3>
            <br>
            <div class="col-md-12">
              @if ($academyJ->isOpen())
                <p>報名截止日期：{{ $academyJ->fill_out_edate }}</p>
                <script type="text/javascript">
                  var date = "<?php echo $academyJ->fill_out_edate; ?>"
                  counter();
                </script>
              @else
                <p>尚未開放</p>
                <p style="line-height: 34px">comming soon</p>
              @endif
            </div>
            <div class="col-md-5">
              <a @if ($academyJ->pdf_url != '') href="{{ $academyJ->pdf_url }}" target="_blank" @else href="#" @endif>
                <button class="button2" ><span>查看簡章</span></button>
              </a>
            </div>
            <div class="col-md-7">
              @if ($academyJ->isOpen())
                <button class="button" onclick="goInput('J');"><span>點我報名</span></button>
              @endif
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
      <p class="sub">有問題歡迎來電洽詢 or 私訊東吳巨資Facebook粉絲專頁</p>
      <p class="subtle-text animate-box" data-animate-effect="fadeIn">Contact</p>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-push-7 animate-box">
        <div class="gtco-contact-info">
          <ul>
            <li class="facebook"><a href="https://www.facebook.com/scubigdata/" target="_blank">東吳巨資粉絲專頁</a></li>
            <li class="fax">02-2880-3947</li>
            <li>&nbsp</li>
            <li class="email">amanda@scu.edu.tw</li>
            <li>&nbsp</li>
            <li class="email">tychen@gm.scu.edu.tw</li>
            <li>&nbsp</li>
            <li class="email">wanning@gm.scu.edu.tw</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-md-pull-4 animate-box">
        <div class="gtco-contact-info">
          <ul>
            <li class="url"><a href="http://bigdata.scu.edu.tw" target="_blank">東吳巨資官網</a></li>
            <li class="clock">承辦業務時間：星期一至五 8:30~17:00</li>
            <li class="user">曾淑晶秘書 &nbsp For 碩士學位學程</li>
            <li class="phone">02-2881-9471 #5934</li>
            <li class="user">陳姿吟組員 &nbsp For 學士學位學程</li>
            <li class="phone">02-2881-9471 #5935</li>
            <li class="user">李婉寧助教 &nbsp For 碩士在職學位學程、巨量資料分析學分學程</li>
            <li class="phone">02-2881-9471 #5936</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<form id="action_form" action="{{ url('studentData/input') }}" method="post">
    {{ csrf_field() }}
    <input id="academyType" type="hidden" name="academyType">
</form>
@endsection

@section('javascript')
<script type="text/javascript">
  function goInput(type) {
    $("#academyType").val(type);
    $("#action_form").submit();
  }
</script>
@endsection
