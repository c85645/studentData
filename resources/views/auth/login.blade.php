
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>東吳大學巨量資料學院報名系統管理</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/auth/signin.css') }}">
  </head>

  <body>
    <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">報名系統管理</h2>
        <label for="inputEmail" class="sr-only">帳號</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="帳號" required autofocus>
        <label for="inputPassword" class="sr-only">密碼</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密碼" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
      </form>
    </div>
  </body>
</html>
