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
    alert('data berhasil dihapus');
    document.location.href = 'pemesanan.php';
    </script>";
  } else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'pemesanan.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

