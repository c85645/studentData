<!DOCTYPE html>
<html>

<head>
  {{-- @include('layout.backend.head') --}}
</head>

<body>
  @yield('html')
  @include('layout.common.script')
  @yield('javascript')
</body>

</html>
