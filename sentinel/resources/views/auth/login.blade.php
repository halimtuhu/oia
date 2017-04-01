<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/login-style.css">
    <title>SIHI</title>
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <img src="/img/oia-logo-login.png" alt="Office of International Affairs">
      </div>
      <form class="" action="/login" method="post">
        <div class="login-block">
          <h2>Login</h2>
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
          @endif
          {{csrf_field()}}
          <input type="text" name="email" placeholder="mail@example.com" id="username" required />
          <input type="password" name="password" placeholder="Password" id="password" required/>
          <button type="submit" value="login">Login</button>
        </div>
      </form>
    </div>
  </body>
</html>
