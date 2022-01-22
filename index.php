<?php
require './config/koneksi.php';
cek_login();
?>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CRUD Data Mahasiswa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap template -->

  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CRUD Data Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./fakultas.php">Fakultas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./prodi.php">Prodi</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./mahasiswa.php">Mahasiswa</a>
        </li>

      </ul>
    </div>
  </nav>
  <main class="container my-3">
    <div class="card">
      <h5 class="card-header">CRUD Data Mahasiswa</h5>
      <div class="card-body">
        <h5 class="card-title">Aplikasi pengelolaan data mahasiswa</h5>
        <p class="card-text">Aplikasi ini dibuat untuk Ujian akhir semester Mata kuliah pemrograman web I, Dalam aplikasi ini terdapat fitur authentikasi, dan beberapa tabel diantaranya tabel Administrator, Fakultas, Prodi Dan tabel mahasiswa.</p>
        <p class="card-text">Aplikasi ini dibuat oleh:</p>
        <p class="card-text my-0 py-0">Handip yusuf kurniawan</p>
        <p class="card-text my-0 py-0">2113201027</p>
      </div>
    </div>
  </main>

  <div class="footer bg-dark text-light py-3 mt-3">
    <div class="container">
      <p class="m-0">Copyright &copy 2022 | Handip yusuf kurniawan (2113201027)</p>
    </div>
  </div>

  <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>