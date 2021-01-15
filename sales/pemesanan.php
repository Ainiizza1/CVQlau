<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_pemesanan.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$pemesanan = data_pemesanan_sales();
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pemesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pemesanan</li>
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
              <a href="pemesanan_tambah.php" class="btn btn-primary btn-sm">Tambah</a>
            </div><!-- /.card-header -->
            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php while ($pecah = $pemesanan->fetch_assoc()) { 
                    if ($pecah['status'] == "Belum Dikonfirmasi" && $pecah['ket_status'] == null ) {
                      $status_pemesanan = "Belum Dikonfirmasi";
                      $button = "<a href='pemesanan_ubah.php?id=".$pecah['id_pemesanan']."' class='btn btn-warning btn-sm'>Ubah</a>
                      <a href='pemesanan_hapus.php?id=".$pecah['id_pemesanan']."' class='btn btn-danger btn-sm'>hapus</a>";
                    } else if ($pecah['status'] == "Belum Dikonfirmasi" && $pecah['ket_status'] == "keuangan") {
                      $status_pemesanan = "Belum Dikonfirmasi, tapi sudah di Acc Keuangan";
                      $button = "<a href='pemesanan_ubah.php?id=".$pecah['id_pemesanan']."' class='btn btn-warning btn-sm'>Ubah</a>";
                    } else if ($pecah['status'] == "Telah Dikonfirmasi" && $pecah['ket_status'] == "gudang") {
                      $status_pemesanan = "Telah Dikonfirmasi";
                      $button = "";
                    }
                    ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($pecah['tgl_pemesanan'])); ?></td>
                      <td><?php echo $status_pemesanan ?></td>
                      <td>
                        <a href="pemesanan_detail.php?id=<?=$pecah['id_pemesanan']?>" class="btn btn-primary btn-sm">Detail</a>
                        <?=$button?>
                      </td>
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

