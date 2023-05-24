<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>E-ARSIP - Login</title>


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <div id="CSS">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
      background-color: #7fb591 !important;
      }

      h1{
      color: #363636;
      font-family: Showcard Gothic;
      }

      .a1{
      color : #363636;
      font-family: Daddysgirl;
      font-size: 20px;
      }

      .btn-primary {
      background-color: #363636;
      border-color: #363636;
      font-family: "Showcard Gothic", sans-serif;
      }

      .btn-primary:hover {
      background-color: #363636;
      border-color: #363636;
      }

      .btn-primary:focus {
      background-color: #363636;
      border-color: #363636;
      }

      .form-label-group label {
      font-family: Daddysgirl;
      }

      .checkbox label {
      font-family: "Daddysgirl", sans-serif;
      font-size: 17px;
      }

    </style></div>
    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
<form class="form-signin" method="post" action="cek_login.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="assets/nahidaa.png" width="150">
    <h1 class="h3 mb-3 font-weight-normal">Manajemen Dokumen</h1>
    <p class="a1">Tugas UTS - Mobile and Website Programming Kelas B</p>
  </div>

  <div class="form-label-group">
    <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
    <label for="username">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <label for="password">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Ingatkan Kata Sandi
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
</body>
</html>
