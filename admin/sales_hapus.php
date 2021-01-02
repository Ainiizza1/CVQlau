  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 
  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id = $_GET["id"];
  
  if (deletesales($id)) {
    echo "<script>
    alert('Data Sales Berhasil Dihapus');
    document.location.href = 'sales.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Sales Gagal Dihapus');
    document.location.href = 'sales.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

