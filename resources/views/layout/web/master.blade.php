<!DOCTYPE html>
<html>

<head>
  @include('layout.web.head')
</head>

<body>
  @include('layout.web.nav')
  @yield('html')
  @include('layout.common.script')
  @yield('javascript')
</body>

</html>
