<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_pemesanan.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$id_pelanggan = $_GET["id"];
if (hapus_pelanggan($id_pelanggan)) {
  echo "<script>
  alert('Data Berhasil Dihapus');
  document.location.href = 'pelanggan.php';
  </script>";
} else {
  echo "<script>
  alert('Data Berhasil Dihapus');
  document.location.href = 'pelanggan.php';
  </script>";
}

?>

<?php include_once('_partials/bawah.php'); ?>

