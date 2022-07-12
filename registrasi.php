<?php
require 'functions.php';

$db = new PDO('mysql:host=localhost;dbname=kuasipem','root','');

// cek ketika tombol tambah sudah diklik
if (isset($_POST['tambah'])) {

  // tambah data ke tabel anggota
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
}


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

    <title>Form Registrasi</title>
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

    <!-- Main regis -->
    <div class="container-fluid pendaftaran py-3">
      <div class="row align-items-center px-3">
        <div class="col-lg-8 mt-2 text-lg-left px-4 py-1">
          <h4>Form Registrasi Pendaftaran</h4>
          <div class="container">
            <div class="row mt-3">
              <div class="col-8">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama anda" required />
                  </div>

                  <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="npm" name="npm" maxlength="10" style="width: 150px" placeholder="Masukan NPM" required />
                  </div>

                  <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan Jurusan" />
                  </div>
                  <select class="form-select mb-3 mt-4" aria-label="Default select example" name="divisi">
                  <?php 
                      $sql = "SELECT * FROM divisi";
                      $data = $db->prepare($sql);
                      $data->execute();
                      while($baris=$data->fetch()){
                  ?>
                    <option selected value="<?= $baris['divisi']; ?>"><?= $baris['divisi']; ?></option>
                    <?php 
                      ;}
                      ?>
                  </select>
                  

            


                  <div class="mb-3">
                    <label for="nomorHp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="nomorHp" name="nomorHp" placeholder="Masukan nomor Handphone" />
                  </div>

                  <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-lg-right" style="width: 350px">
          <img class="img-fluid mt-5 mb-5" src="img/kuas.png" alt="" />
          <h4 class="text-center salam">Salam seni, Salam SemangART</h4>
        </div>
      </div>
    </div>
    <!-- /main regis -->

    <!-- footer -->
    <footer>
      <div class="px-5 py-3 bg-dark text-white">
        <p>Salam SemangArt, 2022</p>
      </div>
    </footer>
    <!-- /footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>
