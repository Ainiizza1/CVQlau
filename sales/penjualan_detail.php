<?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_penjualan.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  $id = $_GET['id'];
  $penjualan =  data_penjualan_sales($id);
  $detail_penjualan=detail_penjualan_sales($id);
  $pem = $penjualan->fetch_assoc();
  // var_dump($pem);die();

  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">penjualan</li>
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
                <a href="penjualan.php" class="btn btn-default btn-sm">Kembali</a>
              </div><!-- /.card-header -->
              
              <div class="card-body">
                <table>
                  <tr>
                    <th>Tanggal Pemesanan</th>
                    <td>: <?=$pem['tgl_pemesanan']?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Setor</th>
                    <td>: <?=$pem['tgl_setor']?></td>
                  </tr>
                  <tr>
                    <th>Total Setor</th>
                    <td>: <?=$pem['jumlah_setor']?></td>
                  </tr>
                </table>
                <br>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php while ($pecah = $detail_penjualan->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td><?php echo $pecah['qty_terjual']; ?></td>
                        <td><?php echo ' Rp '.number_format($pecah['harga_produk']*$pecah['qty_terjual'],0,',','.').' (@Rp '.number_format($pecah['harga_produk'],0,',','.').')'; ?></td>
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

