<?php 
session_start();
if (!isset($_SESSION['login'])){
  header("Location : index.php");
  exit;
}

require 'functions.php';

// Query ke tabel mahasiswa
$mahasiswa = query("SELECT * FROM anggota");

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

      <!-- table -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
      <!-- /table -->
  
      <link rel="stylesheet" href="assets/style.css" />
      <link rel="stylesheet" href="assets/table.scss">

  
      <title>Daftar Anggota</title>
    </head>
  <body>

    <!-- nav -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-1 py-lg-0 px-0 px-lg-5">
        <a href="dashboard.php" class="navbar-brand font-weight-bold" style="font-size: 40px">
          <span class="logos">Salam SemangArt</span>
        </a>
      </nav>
    </div>
    <!-- /nav -->
    
    <div class="container mt-5">
      <h1 class="mb-5">Daftar Anggota Kuas Insan Pembanguna</h1>

      <a href="registrasi.php" class="btn btn-primary mb-3">Tambah Data</a>
      
      <table class="table table-bordered" id="data-tables" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NPM</th>
            <th scope="col">Nama Anggota</th>
            <th scope="col">Divisi Departemen</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Nomor Handphone</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
          $i = 1; foreach($mahasiswa as $mhs) : ?>
          <tr>
            <th scope="row" class="align-middle"><?= $i++; ?></th>
            <td class="align-middle"><?= $mhs["npm"]; ?></td>
            <td class="align-middle"><?= $mhs["nama"]; ?></td>
            <td class="align-middle"><?= $mhs["divisi"]; ?></td>
            <td class="align-middle"><?= $mhs["jurusan"]; ?></td>
            <td class="align-middle"><?= $mhs["nomorHp"]; ?></td>
            <td class="align-middle">
              <a href="edit_anggota.php?id=<?= $mhs["id"]; ?>" class="btn badge bg-warning">ubah</a>
              <a href="hapus_anggota.php?id=<?= $mhs["id"]; ?>" class="btn badge bg-danger" onclick="return confirm('yakin?');">hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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


    <!-- table -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript"> 
        $(document).ready(function () {
            $('#data-tables').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
    <!-- /tables -->

   

    
  </body>
</html>
