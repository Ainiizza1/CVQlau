<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_pemesanan.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$id_pemesanan = $_GET["id"];
if (hapus_pemesanan($id_pemesanan)) {
  echo "<script>
  alert('Data Pemesanan Berhasil Dihapus');
  document.location.href = 'pemesanan.php';
  </script>";
} else {
  echo "<script>
  alert('Data Pemesanan Gagal Dihapus');
  document.location.href = 'pemesanan.php';
  </script>";
}

?>

<?php include_once('_partials/bawah.php'); ?>

