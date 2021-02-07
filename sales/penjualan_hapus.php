<?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_penjualan.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id_penjualan = $_GET["id"];
  if (hapus_penjualan($id_penjualan)) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'penjualan.php';
    </script>";
  } else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'penjualan.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

