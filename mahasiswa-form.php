<?php
require './config/koneksi.php';
cek_login();

// deklarasi variable pesan
$message = false;
$message_status = false;

// cek apakah ada data yang di submit
if (isset($_POST['submit'])) {
  // ambil data dan simpan ke dalam variable
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $prodi = $_POST['prodi'];
  $query = "";


  // cek apakah datanya di tambah atau di update dengan mengecek alamat url
  if (isset($_GET['edit'])) {
    $npm = $_GET['edit'];
    $query = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', prodi_id='$prodi' WHERE npm='$npm'";
  }
  // jika tidak ada data yang di kirim di url maka data di tambah
  else {
    $query = "INSERT INTO mahasiswa(npm, nama, alamat, prodi_id) VALUES ($npm, '$nama', '$alamat', '$prodi')";
  }
  $result = mysqli_query($conn, $query);

  // buat pesan untuk menandakan query berhasil atau tidak
  $message = $result ? "Data berhasil disimpan" : "Data gagal disimpan";
  $message_status = $result;
}

$npm = '';
$nama = '';
$alamat = '';
$prodi = '';
$title = 'Tambah';
// cek jika halaman ini untuk edit data
if (isset($_GET['edit'])) {
  $npm = $_GET['edit'];
  $title = 'Ubah';

  // mengambil data dari database
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm='$npm'");
  $data = mysqli_fetch_assoc($result);
  // jika data di temukan maka simpan ke dalam variable yang sudah ada.
  if ($data) {
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $prodi = $data['prodi_id'];
  }
}
?>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?> Data Mahasiswa | CRUD Data Mahasiswa</title>
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
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./fakultas.php">Fakultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./prodi.php">Prodi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./mahasiswa.php">Mahasiswa</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="container">
    <?php if ($message) : ?>
      <div class="alert alert-<?= $message_status ? 'success' : 'danger' ?> alert-dismissible fade show mt-2" role="alert">
        <strong><?= $message_status ? 'Berhasil' : 'Gagal' ?></strong> <?= $message ?>
      </div>
    <?php endif; ?>
    <div class="card shadow mt-3">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <label class="h6"><?= $title ?> Data Mahasiswa</label>
          <a href="./mahasiswa.php" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="prodi">Prodi</label>
            <select class="form-control" name="prodi" id="prodi">
              <?php
              $result = mysqli_query($conn, "SELECT * FROM prodi");
              while ($row = mysqli_fetch_assoc($result)) {
                $selected = $row['id'] == $prodi ? 'selected' : '';
                echo "<option value='{$row['id']}' {$selected}>{$row['nama']}</option>";
              }
              ?>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="npm">NPM Mahasiswa</label>
                <input type="number" <?= isset($_GET['edit']) ? 'readonly' : '' ?> class="form-control" name="npm" id="npm" value="<?= $npm ?>" placeholder="NPM Mahasiswa" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Mahasiswa" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $alamat ?></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary" title="Simpan data">Simpan</button>
        </form>
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