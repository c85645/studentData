<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">後台管理系統</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{-- {{ $errors->has('account') ? ' has-error' : '' }} --}}">
                                    <label for="account" class="col-md-4 control-label">帳號</label>

                                    <div class="col-md-6">
                                        <input id="account" type="text" class="form-control" name="account" value="{{ old('account') }}" onkeyup="enterArabEng(this);" required autofocus maxlength="20">

                                        {{-- @if ($errors->has('account'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('account') }}</strong>
                                            </span>
                                        @endif --}}
                                    </div>
                                </div>

                                <div class="form-group{{-- {{ $errors->has('password') ? ' has-error' : '' }} --}}">
                                    <label for="password" class="col-md-4 control-label">密碼</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" onkeyup="enterArabEng(this);" required maxlength="20">

                                        {{-- @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif --}}
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            登入
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.common.errors')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/common/common.js') }}"/></script>
</body>
</html>
