<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_pemesanan.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');
$id = $_GET['id'];
$detail_sales=detail_sales($id);
  // var_dump($pem);die();

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Sales</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
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
              <a href="pemesanan.php" class="btn btn-default btn-sm">Kembali</a>
            </div><!-- /.card-header -->

            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>id user</th>
                    <th>No Kendaraan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php while ($pecah = $detail_sales->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $pecah['foto']; ?></td>
                      <td><?php echo $pecah['nik']; ?></td>
                      <td><?php echo $pecah['nama_sales']; ?></td>
                      <td><?php echo $pecah['alamat']; ?></td>
                      <td><?php echo $pecah['id_user']; ?></td>
                      <td><?php echo $pecah['plat']; ?></td>
                    </tr>
                    <?php $nomor++ ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include_once('_partials/bawah.php'); ?>

