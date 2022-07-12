<?php


// start koneksi
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'kuasipem') or die('Koneksi ke DB GAGAL!');

  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// end koneksi


// start anggota
function tambah($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data["nama"]);
  $npm = htmlspecialchars($data["npm"]);
  $divisi = htmlspecialchars($data["divisi"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $nomorHp = htmlspecialchars($data["nomorHp"]);

  $query = "INSERT INTO anggota VALUES (null, '$nama', '$npm', '$divisi', '$jurusan', '$nomorHp')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  $mhs = query("SELECT * FROM anggota WHERE id = $id")[0];

  mysqli_query($conn, "DELETE FROM anggota WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}


function ubah($data)
{
  $conn = koneksi();

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $npm = htmlspecialchars($data["npm"]);
  $divisi = htmlspecialchars($data["divisi"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $nomorHp = htmlspecialchars($data["nomorHp"]);

  $query = "UPDATE anggota SET
              nama = '$nama',
              npm = '$npm',
              divisi = '$divisi',
              jurusan = '$jurusan',
              nomorHp = '$nomorHp',
            WHERE id = $id
           ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function login ($data){
  $username = htmlspecialchars($data['nama']);
  $password = htmlspecialchars($data['password']);
  
  if (query("SELECT * FROM akses WHERE nama = '$username' && password = '$password'")){
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
    exit;
  } else {
    return [
      'error' => true,
      // 'pesan' => 'Username / Password Salah!'
    ];
  }


}


// end anggota

// start publikasi

function tambahKegiatan($data)
{
  $conn = koneksi();

  // cek apakah ada gambar yang diupload
  if ($_FILES["gambar"]["error"] === 4) {
    // jika user tidak memilih gambar, beri gambar default
    $gambar = 'nophoto.jpg';
  } else {
    // jika user memilih gambar, jalankan fungsi upload
    $gambar = upload();
    // cek apakah upload berhasil
    if (!$gambar) {
      return false;
    }
  }


  $namaKegiatan = htmlspecialchars($data["namaKegiatan"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $tanggalKegiatan = htmlspecialchars($data["tanggalKegiatan"]);
  // $gambar = htmlspecialchars($data["gambar"]);

  $query = "INSERT INTO kegiatan VALUES (null, '$namaKegiatan', '$deskripsi','$tanggalKegiatan', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapusKegiatan($id)
{
  $conn = koneksi();

  $k = query("SELECT * FROM kegiatan WHERE id = $id")[0];

  mysqli_query($conn, "DELETE FROM kegiatan WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}


function ubahKegiatan($data)
{
  $conn = koneksi();
  // cek apakah ada gambar yang diupload
  if ($_FILES["gambar"]["error"] === 4) {
    // jika user tidak memilih gambar, beri gambar default
    $gambar = 'nophoto.jpg';
  } else {
    // jika user memilih gambar, jalankan fungsi upload
    $gambar = upload();
    // cek apakah upload berhasil
    if (!$gambar) {
      return false;
    }
  }

  $id = $data["id"];
  $namaKegiatan = htmlspecialchars($data["namaKegiatan"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $tanggalKegiatan = htmlspecialchars($data["tanggalKegiatan"]);
  // $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE kegiatan SET
              namaKegiatan = '$namaKegiatan',
              deskripsi = '$deskripsi',
              tanggalKegiatan = '$tanggalKegiatan',
              gambar = '$gambar'
            WHERE id = $id
           ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

// end publikasi

// produk
function tambahProduk($data)
{
  $conn = koneksi();

  // cek apakah ada gambar yang diupload
  if ($_FILES["gambar"]["error"] === 4) {
    // jika user tidak memilih gambar, beri gambar default
    $gambar = 'nophoto.jpg';
  } else {
    // jika user memilih gambar, jalankan fungsi upload
    $gambar = upload();
    // cek apakah upload berhasil
    if (!$gambar) {
      return false;
    }
  }
  $namaProduk = htmlspecialchars($data["namaProduk"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $harga = htmlspecialchars($data["harga"]);
  // $gambar = htmlspecialchars($data["gambar"]);

  $query = "INSERT INTO produk VALUES (null, '$namaProduk', '$deskripsi','$harga', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubahProduk($data){
  $conn = koneksi();
  // cek apakah ada gambar yang diupload
  if ($_FILES["gambar"]["error"] === 4) {
    // jika user tidak memilih gambar, beri gambar default
    $gambar = 'nophoto.jpg';
  } else {
    // jika user memilih gambar, jalankan fungsi upload
    $gambar = upload();
    // cek apakah upload berhasil
    if (!$gambar) {
      return false;
    }
  }

  $id = $data["id"];
  $namaProduk = htmlspecialchars($data["namaProduk"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $harga = htmlspecialchars($data["harga"]);
  // $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE produk SET
              namaProduk = '$namaProduk',
              deskripsi = '$deskripsi',
              harga = '$harga',
              gambar = '$gambar'
            WHERE id = $id
           ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapusProduk($id)
{
  $conn = koneksi();

  $p = query("SELECT * FROM produk WHERE id = $id")[0];

  mysqli_query($conn, "DELETE FROM produk WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
// end produk

// fungsi upload gambar
function upload()
{


  // Siapkan data gambar
  $filename = $_FILES["gambar"]["name"];
  $filesize = $_FILES["gambar"]["size"];
  $filetmpname = $_FILES["gambar"]["tmp_name"];
  $filetype = pathinfo($filename, PATHINFO_EXTENSION);
  $allowedtype = ["jpg", "jpeg", "png"];

  // Cek apakah file bukan gambar
  if (!in_array($filetype, $allowedtype)) {
    echo "<script>
            alert('Yang anda upload bukan gambar!');
          </script>";
    return false;
  }

  // cek jika ukuran lebih besar dari 1MB
  if ($filesize > 10000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // Lolos pengecekan gambar
  // buat nama file baru
  $newfilename = uniqid() . $filename;
  // upload gambar
  move_uploaded_file($filetmpname, 'img/' . $newfilename);

  return $newfilename;
}