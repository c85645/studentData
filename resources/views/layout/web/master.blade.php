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
  @include('layout.web.script')
  @yield('javascript')
</body>

</html>
