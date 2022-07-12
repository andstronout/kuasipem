<?php
session_start();
if (!isset($_SESSION['login'])){
  header("Location : index.php");
  exit;
}

require 'functions.php';

// Query data kegiatan berdasarkan id
$id = $_GET["id"];
$k = query("SELECT * FROM kegiatan WHERE id = $id")[0];

// cek ketika tombol ubah sudah diklik
if (isset($_POST['ubah'])) {

  // ubah data di tabel kegiatan
  if (ubahKegiatan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = 'tampil_publikasi.php';
          </script>";
  }
}


?>
<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
  
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  
      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
  
      <link rel="stylesheet" href="assets/style.css" />
  
      <title>Ubah Data Kegiatan</title>
    </head>

<body>

    <!-- nav -->
    <div class="container-fluid bg-light position-relative shadow">
          <nav class="navbar navbar-expand-lg bg-light navbar-light py-1 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold" style="font-size: 40px">
          <span class="logos">Salam SemangArt</span>
        </a>
      </nav>
    </div>
    <!-- /nav -->

  <div class="container mt-5">
    <h1>Form Ubah Data Kegiatan</h1>

    <a href="tampil_publikasi.php" class="btn btn-primary">Kembali ke Daftar Kegiatan</a>

    <div class="row mt-3">
      <div class="col-8">
        <form action="" method="post"  enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $k["id"]; ?>">
          <div class="mb-3">
            <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan" required value="<?= $k["namaKegiatan"]; ?>">
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $k["deskripsi"]; ?>">
          </div>
          <div class="mb-3">
            <label for="tanggalKegiatan" class="form-label">Tanggal Kegiatan</label>
            <input type="text" class="form-control" id="tanggalKegiatan" name="tanggalKegiatan" required value="<?= $k["tanggalKegiatan"]; ?>">
          </div>
          
          <div class=" mb-3">
            <img src="img/<?= $k["gambar"]; ?>" height="50" class="rounded-circle">
          </div>
          <div class=" mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img src="" class="img-thumbnail img-preview" width="120" style="display:none;">
            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
          </div>
          

          <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>

        </form>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
      <div class="px-5 py-3 bg-dark text-white mt-5">
        <p>Salam SemangArt, 2022</p>
      </div>
    </footer>
    <!-- /footer -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>