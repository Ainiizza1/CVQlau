<html>

<head>
  <script src="jquery.min.js" type="text/javascript"></script>
</head>

<body>

  <?php
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_penjualan.php');

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  $id = $_GET['id'];
  $penjualan =  data_penjualan_sales($id);
  $detail_penjualan = detail_penjualan_sales($id);
  $pem = $penjualan->fetch_assoc();

  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Penjualan</li>
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
                  <a href="Penjualan.php" class="btn btn-default btn-sm">Kembali</a>

                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <table>
                  <tr>
                    <th>Tanggal Pemesanan</th>
                    <td>: <?= $pem['tgl_pemesanan'] ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Setor</th>
                    <td>: <?= $pem['tgl_setor'] ?></td>
                  </tr>
                </table>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">List Produk Roti yang dipesan</h3>
                  </div>
                  <!-- /.card-header -->

                  <!-- form start -->
                  <form method="post" enctype="multipart/form-data">
                    <div class="card-body ">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Terjual</th>
                            <th>Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $nomor = 1; ?>
                          <?php while ($pecah = $detail_penjualan->fetch_assoc()) { ?>
                            <tr>
                              <td><?php echo $nomor; ?></td>
                              <td>
                                <?php echo $pecah['nama_produk'] . ' [ ' . $pecah['qty_ambil'] . ' buah ]'; ?>
                                <input name="id_produk[]" type="hidden" class="form-control" required value="<?= $pecah['id_produk'] ?>">
                              </td>
                              <td>
                                <input name="jumlah[]" type="number" class="form-control" min='0' required value="<?= $pecah['qty_terjual'] ?>">
                                <input name="harga[]" type="hidden" class="form-control" min='0' required value="<?= $pecah['harga_produk'] ?>">
                              </td>
                              <td><?php echo '@Rp ' . number_format($pecah['harga_produk'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php $nomor++ ?>
                          <?php } ?>
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                      <input type="hidden" name="id_sales" value="<?php echo $_SESSION['id'] ?>">
                      <input name="id_penjualan" type="hidden" class="form-control" min='0' required value="<?= $pem['id_penjualan'] ?>">
                      <input name="id_pemesanan" type="hidden" class="form-control" min='0' required value="<?= $pem['id_pemesanan'] ?>">
                      <input name="tgl_setor" type="hidden" class="form-control" min='0' required value="<?= date('Y-m-d'); ?>">
                      <button type="submit" class="btn btn-primary" name="ubah">simpan</button>
                      <button type="submit" class="btn btn-primary" name="reset" id="btn-reset-form">Reset</button>
                    </div>

                  </form>

                  <?php
                  if (isset($_POST['ubah'])) {
                    var_dump($_POST);
                    // die();
                    $id_penjualan = $_POST['id_penjualan'];
                    $id_pemesanan = $_POST['id_pemesanan'];
                    $jumlah_setor =0;
                    $error = false;
                    for ($i = 0; $i < count($_POST['id_produk']); $i++) {
                      $id_produk = $_POST['id_produk'][$i];
                      $jumlah = $_POST['jumlah'][$i];
                      $harga = $_POST['harga'][$i];
                      $ambil = $conn->query("UPDATE t_detail_penjualan SET qty_terjual='$jumlah' WHERE id_penjualan='$id_penjualan' and id_produk='$id_produk'");
                      
                      if (!$ambil) {
                        $error = true;
                      }
                      $jumlah_setor = $jumlah_setor+($jumlah*$harga);

                    }
                    if (!$error) {
                      $ambil = $conn->query("UPDATE t_penjualan SET jumlah_setor='$jumlah_setor' WHERE id_penjualan='$id_penjualan'");
                    }
                  }

                  ?>

                </div>

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

</body>

</html>