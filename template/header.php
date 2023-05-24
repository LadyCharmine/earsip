<?php
session_start();
//mengatasi jika user langsung masuk menggunakan link, tanpa login
if(empty($_SESSION['id_user']) or empty($_SESSION['username']))
{
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
      document.location='index.php';
      </script>";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <div id="CSS">
    <style>
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

      .navbar {
      font-family: Daddysgirl;
      background-color: #3a5f3a !important;
      }

    </style></div>

    <title>Nahida's Archieve </title>
  </head>
  <body>
    <!-- Awal Nav / Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="?">E-Arsip</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="?">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?halaman=departemen">Data Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?halaman=pengirim_surat">Data Pengirim Dokumen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?halaman=arsip_surat">Data Arsip Dokumen</a>
              </li>
             
            </ul>
            <!--<form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
          </div>
      </div>
      
    </nav>
    <!-- Akhir Nav/Menu -->
    <!-- Awal Container -->
    <div class="container">