  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('../function.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  if (isset($_POST["submit"]) {
    if (ubah ($_POST) > 0 ) {
      echo "<script>
      alert('data berhasil diubah');
      document.location.href = 'produk.php';
      </script>";
    } else {
      echo "<script>
      alert('data gagal diubah');
      document.location.href = 'produk.php';
      </script>";
    }
  }


  ?>

  <?php include_once('_partials/bawah.php'); ?>

