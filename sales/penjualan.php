<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_penjualan.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$penjualan = data_penjualan_sales();
// var_dump($penjualan);die();
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Penjualan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Penjualan</li>
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
              <a href="penjualan_tambah.php" class="btn btn-primary btn-sm">Tambah</a>
            </div><!-- /.card-header -->
            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Tanggal Setor</th>
                    <th>Jumlah Setor</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php while ($pecah = $penjualan->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pecah['tgl_pemesanan'])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pecah['tgl_setor'])); ?></td>
                    <td><?php echo 'Rp ' . number_format($pecah['jumlah_setor'], 0, ',', '.'); ?></td>
                    <td>
                      <a href="penjualan_detail.php?id=<?=$pecah['id_penjualan']?>" class="btn btn-primary btn-sm">Detail</a>
                      <a href="penjualan_ubah.php?id=<?=$pecah['id_penjualan']?>" class="btn btn-warning btn-sm">Ubah</a>
                      <a href="penjualan_hapus.php?id=<?=$pecah['id_penjualan']?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  <?php $nomor++; }?>
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

