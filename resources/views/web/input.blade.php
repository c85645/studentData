<!DOCTYPE HTML>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>東吳巨資報名系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="FreeHTML5.co" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('css/web/animate.css') }}">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{ asset('css/web/icomoon.css') }}">
  <!-- Themify Icons-->
  <link rel="stylesheet" href="{{ asset('css/web/themify-icons.css') }}">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{ asset('css/web/bootstrap.css') }}">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{ asset('css/web/magnific-popup.css') }}">
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('css/web/owl.theme.default.min.css') }}">
  <!-- Theme style  -->
  <link rel="stylesheet" href="{{ asset('css/web/style.css') }}">

</head>
<body>

  <div class="gtco-loader"></div>

  <div id="page">
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

    <footer id="gtco-footer" role="contentinfo">
      <div class="container">

        <div class="row copyright">
          <div class="col-md-12">
            <p align="center">
              <small class="block">台北市士林區臨溪路70號【東吳大學外雙溪校區】</small>
              <small class="block">School of Big Data Management</a></small>
              <small class="block">版權所有 Copyright 2017 © 東吳大學巨量資料管理學院</a></small>
            </p>
          </div>
        </div>

      </div>
    </footer>
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('js/web/jquery.min.js') }}"></script>
  <!-- jQuery Easing -->
  <script src="{{ asset('js/web/jquery.easing.1.3.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/web/bootstrap.min.js') }}"></script>
  <!-- Waypoints -->
  <script src="{{ asset('js/web/jquery.waypoints.min.js') }}"></script>
  <!-- Stellar -->
  <script src="{{ asset('js/web/jquery.stellar.min.js') }}"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('js/web/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/web/magnific-popup-options.js') }}"></script>
  <!-- Main -->
  <script src="{{ asset('js/web/main.js') }}"></script>
  <!-- Modernizr JS -->
  <script src="{{ asset('js/web/modernizr-2.6.2.min.js') }}"></script>
  <script src="{{ asset('js/common/common.js') }}"/></script>

</body>
</html>
