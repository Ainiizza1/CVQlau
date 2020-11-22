  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id_produk = $_GET["id"];
  if (deleteproduk($id_produk)) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'produk.php';
    </script>";
  } else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'produk.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

