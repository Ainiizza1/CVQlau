<html>

<head>
  <script src="jquery.min.js" type="text/javascript"></script>
</head>

<body>

  <?php
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_pemesanan.php');
  require_once('function_penjualan.php');

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  $jenisproduk = tampil_jproduk();
  $pesanan = tampil_pesanan_aktif_sales();

  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Penjualan</li>
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
                <form method="post">
                  <label>Tanggal Pemesanan</label>
                  <div class="form-group col-12 row">
                    <select class="form-control col-10" name="pesanan" required>
                      <option selected disabled>Silahkan Dipilih</option>
                      <?php foreach ($pesanan as $p) : ?>
                        <option value="<?php echo $p['id_pemesanan'] ?>"><?php echo $p['tgl_pemesanan'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <div class="form-group col-2">
                      <button type="submit" class="btn btn-primary col-12" name="tampil">tampilkan</button>
                    </div>
                  </div>

                </form>
                <?php if (isset($_POST['tampil'])) {
                  $detail_pemesanan = detail_pemesanan_sales($_POST['pesanan']);
                ?>
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
                            <?php while ($pecah = $detail_pemesanan->fetch_assoc()) { ?>
                              <tr>
                                <td><?php echo $nomor; ?></td>
                                <td>
                                  <?php echo $pecah['nama_produk'] . ' [ ' . $pecah['qty_ambil'] . ' buah ]'; ?>
                                  <input name="id_produk[]" type="hidden" class="form-control" required value="<?= $pecah['id_produk'] ?>">
                                </td>
                                <td>
                                  <input name="jumlah[]" type="number" class="form-control" min='0' required>
                                  <input name="harga[]" type="hidden" class="form-control" min='0' required value="<?=$pecah['harga_produk']?>">
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
                        <input name="id_pemesanan" type="hidden" class="form-control" min='0' required value="<?= $_POST['pesanan'] ?>">
                        <input name="tgl_setor" type="hidden" class="form-control" min='0' required value="<?= date('Y-m-d'); ?>">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        <button type="submit" class="btn btn-primary" name="reset" id="btn-reset-form">Reset</button>
                      </div>

                    </form>
                  <?php } ?>

                  <?php
                  if (isset($_POST['tambah'])) {
                    $id_pemesanan = $_POST['id_pemesanan'];
                    $tgl_setor = $_POST['tgl_setor'];
                    $jumlah_setor = 0;
                    $ambil = $conn->query("INSERT INTO t_penjualan (id_pemesanan,tgl_setor,jumlah_setor)
                        VALUES('$id_pemesanan','$tgl_setor', '$jumlah_setor')");
                    if ($ambil == true) {
                      $result = mysqli_query($conn, "SELECT id_penjualan FROM t_penjualan ORDER BY id_penjualan DESC LIMIT 1");
                      $id_penjualan = $result->fetch_assoc()['id_penjualan'];
                      for ($i = 0; $i < count($_POST['id_produk']); $i++) {
                        $id_produk = $_POST['id_produk'][$i];
                        $jumlah = $_POST['jumlah'][$i];
                        $harga = $_POST['harga'][$i];

                        $ambil = $conn->query("INSERT INTO t_detail_penjualan (id_penjualan,id_produk,qty_terjual)
                              VALUES('$id_penjualan','$id_produk','$jumlah')");
                        if ($ambil) {
                          $jumlah_setor = $jumlah_setor+($jumlah*$harga);
                        } else {

                          echo "Error Detail : " . mysqli_error($conn);
                        }
                      }
                      
                      $ambil = $conn->query("UPDATE t_penjualan SET jumlah_setor='$jumlah_setor' WHERE id_penjualan='$id_penjualan'");
                      
                      echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Penjualan Berhasil Ditambahkan</button>";
                      echo "<script> location='penjualan.php'; </script>";
                    } else {
                      echo "Error : " . mysqli_error($conn);
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