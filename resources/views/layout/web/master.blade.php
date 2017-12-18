<!DOCTYPE html>
<html>

<head>
  @include('layout.web.head')
</head>

<body>
  <div class="gtco-loader"></div>
  <div id="page">
    @yield('html')
    @include('layout.web.footer')
  </div>
  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
  @yield('javascript')
  @include('layout.web.script')
</body>

</html>
