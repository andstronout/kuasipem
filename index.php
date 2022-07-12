<?php 
require 'functions.php';

$produk = query("SELECT * FROM produk");
$kegiatan = query("SELECT * FROM kegiatan");

?>




<!DOCTYPE html>
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

    <title>Salam SemangArt</title>
  </head>
  <body>
    <!-- nav -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold" style="font-size: 40px">
          <span class="logos">Salam SemangArt</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a href="#divisi" class="nav-item nav-link">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#news" class="nav-item nav-link">News</a>
              </li>
              <li class="nav-item">
                <a href="#produk" class="nav-item nav-link">Contact</a>
              </li>
            </ul>
          </div>
          <a href="registrasi.php" class="btn btn-login btn-primary px-4">Ayo Gabung</a>
        </div>
      </nav>
    </div>
    <!-- /nav -->

    <!-- header -->
    <div class="container-fluid header px-0 px-md-5 mb-5">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          <h1 class="text-white text-header mb-4 mt-5 mt-lg-0">KUAS Insan Pembangunan</h1>
          <h5 class="text-white text-header mb-4">Halo sahabat seni, Kami adalah departemen kumpulan anak seni dari Insan Pembangunan</h5>
          <p>Ayo jadi bagian dari kami</p>
          <a href="registrasi.php" class="btn btn-header btn-secondary mt-1 py-3 px-5">Ayo Gabung</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5 mb-5" src="img/header.png" alt="" />
        </div>
      </div>
    </div>
    <!-- /header -->

    <!-- divisi -->
    <div class="container" id="divisi">
      <h1 class="text-center mb-4" style="font-family: 'Handlee', cursive">Divisi Kami</h1>
      <div class="row row-cols-3 row-cols-md-4 mb-4 mx-auto text-center d-flex justify-content-center">
        <div class="col">
          <div class="card">
            <img src="img/02.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Teater</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="img/03.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Musik</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="img/04.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Tari</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-cols-3 row-cols-md-4 mb-4 mx-auto text-center d-flex justify-content-center">
        <div class="col">
          <div class="card">
            <img src="img/05.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Fotografi</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="img/06.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Rupa</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="img/07.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Seni Standup Comedy</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /divisi -->

    <!-- Kegiatan -->
    <div class="container mt-5" id="news">
      <h1 class="text-center mt-2 mb-4" style="font-family: 'Handlee', cursive">News and Article</h1>
      <div class="card mb-3 ">
      <?php 
          $i = 1; foreach($kegiatan as $k) : 
          ?>
        <div class="row g-0 kegiatan mb-3 shadow" style="background-color: #dedede;">
          <div class="col-md-4">
            <img src="img/<?= $k["gambar"]; ?>" class="img-fluid rounded-start" alt="..." />
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <h5 class="card-title"><?= $k["namaKegiatan"]; ?></h5>
              <p class="card-text"><?= $k["deskripsi"]; ?></p>
              <p class="card-text"><small class="text-muted"><?= $k["tanggalKegiatan"]; ?></small></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- /Kegiatan -->

    <!-- produk -->
    <div class="container" id="produk">
        <h1 class="text-center produk mt-5 mb-2">Produk Kita Nih</h1>
      <div class="row row-cols-3 row-cols-md-4 mb-4 mx-auto text-center d-flex justify-content-center">
      <?php 
          $i = 1; foreach($produk as $p) : ?>  
        <div class="col">
          <div class="card">
            <img src="img/<?= $p["gambar"]; ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $p["namaProduk"]; ?> <small>Rp.<?= $p["harga"]; ?></small></h5>
              <p class="card-text"><?= $p["deskripsi"]; ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>




      <h4 class="mt-2 text-center">Mau punya merchandise kece kita? sikat aja nih disini</h4>
      <div class="d-flex justify-content-center mb-5">
        <a href="https://api.whatsapp.com/send?phone=6281287276707&text=Hallo%20Ka%20%2C%20saya%20mau%20order%20produk%20kuas%20nihh" class="btn btn-checkout btn-primary px-4 mt-4">Hubungi Kami</a>
      </div>
    <!-- /produk -->

    <!-- footer -->
    <footer>
      <div class="px-5 py-3 bg-dark text-white">
        <div class="row">
          <div class="col col-lg-6 text-start">
            <h5>Tools</h5>
            <a href="login.php" class="text-white">Administrator</a>
          </div>
          <div class="col col-lg-6 text-end align-self-center">
            <p>Salam SemangArt, 2022</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- /footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
