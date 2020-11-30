<?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_pemesanan.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id = $_GET["id"];
  if (konfirmasi_pemesanan($id)) {
    echo "<script>
    alert('data berhasil dikonfirmasi');
    document.location.href = 'pemesanan.php';
    </script>";
  } else {
    echo "<script>
    alert('data gagal dikonfirmasi');
    document.location.href = 'pemesanan.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

