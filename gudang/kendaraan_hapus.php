  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id = $_GET["id"];
  
  if (deletekendaraan($id)) {
    echo "<script>
    alert('Data Kendaraan Berhasil Dihapus');
    document.location.href = 'kendaraan.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Kendaraan Gagal Dihapus');
    document.location.href = 'kendaraan.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

