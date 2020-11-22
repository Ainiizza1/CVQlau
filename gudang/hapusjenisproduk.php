  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id_jproduk = $_GET["id"];
  if (deletejenisproduk($id_jproduk)) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'jenisproduk.php';
    </script>";
  } else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'jenisproduk';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

