  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_pegawai.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id = $_GET["id"];
  
  if (deletepegawai($id)) {
    echo "<script>
    alert('Data Pegawia Berhasil Dihapus');
    document.location.href = 'pegawai.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Pegawai Gagal Dihapus');
    document.location.href = 'pegawai.php';
    </script>";
    echo mysqli_error($conn);
  }

  ?>

  <?php include_once('_partials/bawah.php'); ?>

