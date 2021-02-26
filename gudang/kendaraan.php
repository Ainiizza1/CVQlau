<?php 
session_start(); 
require_once('../url.php'); 
require_once('../function.php'); 


if (!isset($_SESSION['login'])) {
  header('Location: ../index.php');
  exit();
}

include_once('_partials/atas.php');
include_once('_partials/kiri.php');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Kendaraan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Kendaraan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <section class="col connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Halaman Data Kendaraan
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Plat</th>
                    <th>Warna</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php $ambil = $conn->query("SELECT * FROM t_kendaraan"); ?>
                  <?php while ($pecah = $ambil->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $pecah['nama_kendaraan']; ?></td>
                      <td><?php echo $pecah['plat']; ?></td>
                      <td><?php echo $pecah['warna']; ?></td>
                      <!-- <td>
                        <a href="kendaraan_hapus.php?id=<?= $pecah['id_kendaraan']; ?>" class="btn-danger btn">Hapus</a>
                        <a href="kendaraan_ubah.php?id=<?= $pecah['id_kendaraan']; ?>" class="btn btn-warning">Ubah</a>
                      </td> -->
                    </tr>
                    <?php $nomor++ ?>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Plat</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.card-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php include_once('_partials/bawah.php'); ?>