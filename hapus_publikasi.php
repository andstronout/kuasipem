<?php 
session_start();
if (!isset($_SESSION['login'])){
  header("Location : index.php");
  exit;
}
require 'functions.php';

$id = $_GET['id'];

if( hapusKegiatan($id) > 0 ) {
  echo "<script>
          alert('data berhasil dihapus!');
          document.location.href = 'tampil_publikasi.php';
        </script>";
}