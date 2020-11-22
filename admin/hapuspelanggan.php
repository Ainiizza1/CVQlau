  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id_pelanggan = $_GET["id"];
  if (deletepelanggan($id_pelanggan)) {
    echo "<script>
    alert('Data Pelanggan Berhasil Dihapus');
    document.location.href = 'pelanggan.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Pelanggan Gagal Dihapus');
    document.location.href = 'pelanggan.php';
    </script>";
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

