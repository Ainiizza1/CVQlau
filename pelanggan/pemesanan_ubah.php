<?php
session_start();
include('cek_session.php');
require_once('../url.php');
require_once('function_pemesanan.php');

include_once('_partials/atas.php');
include_once('_partials/kiri.php');
$id = $_GET['id'];
$pemesanan =  data_pemesanan_sales($id);
$detail_pemesanan = detail_pemesanan_sales($id);
$jenisproduk = tampil_jproduk();
$pem = $pemesanan->fetch_assoc();
// var_dump($pem);die();

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ubah Pemesanan</h1>
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
              <a href="pemesanan.php" class="btn btn-default btn-sm">Kembali</a>
            </div><!-- /.card-header -->

            <div class="card-body">
              <table>
                <tr>
                  <th>No Pesanan</th>
                  <td>: <?= $pem['id_pemesanan'] ?></td>
                </tr>
                <tr>
                  <th>Tanggal Pesanan</th>
                  <td>: <?= $pem['tgl_pemesanan'] ?></td>
                </tr>
                <tr>
                  <th>Status Pesanan</th>
                  <td>: <?= $pem['status'] ?></td>
                </tr>
              </table>
              <br>
              <form method="post">
                <div class="card-body ">

                  <?php while ($pecah = $detail_pemesanan->fetch_assoc()) { ?>
                    <div class="row">
                      <div class="form-group col-8">
                        <label>NAMA PRODUK</label>
                        <select class="form-control selectlive" name="namaproduk[]" required disabled>
                          <option selected disabled>Silahkan Dipilih</option>
                          <?php foreach ($jenisproduk as $jproduk) : ?>
                            <option <?= ($pecah['id_produk'] == $jproduk['id_produk']) ? 'selected' : '' ?> value="<?php echo $jproduk['id_produk'] ?>"><?php echo $jproduk['nama_produk'] ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                        <input name="namaproduk[]" type="hidden" class="form-control" value="<?= $pecah['id_produk'] ?>" required>
                        <input name="id_pemesanan[]" type="hidden" class="form-control" value="<?= $pecah['id_pemesanan'] ?>" required>
                      </div>
                      <div class="form-group col-4">
                        <label>JUMLAH PRODUK</label>
                        <input name="jumlah[]" type="number" class="form-control" value="<?= $pecah['qty_ambil'] ?>" required>
                      </div>
                    </div>
                    <div id="insert-form2"></div>
                  <?php } ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                  <button type="submit" class="btn btn-primary" name="reset" id="btn-reset-form">Reset</button>
                </div>
              </form>

              <?php
              if (isset($_POST['tambah'])) {
                // var_dump($_POST);die();
                $jumlah_data = count($_POST['namaproduk']);
                for ($i = 0; $i < $jumlah_data; $i++) {
                  $id_pemesanan = $_POST['id_pemesanan'][$i];
                  $namaproduk = $_POST['namaproduk'][$i];
                  $jumlah = $_POST['jumlah'][$i];

                  $ambil = $conn->query("UPDATE t_detail_pemesanan SET qty_ambil = '$jumlah' WHERE id_pemesanan = '$id_pemesanan' AND id_produk = '$namaproduk'");
                  if ($ambil == false) {
                    echo "Error Detail : " . mysqli_error($conn);
                  }
                }

                // var_dump(mysql_error());die();

                echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Pemesanan Berhasil Diubah</button>";
                echo "<script> location='pemesanan.php'; </script>";
              }

              ?>

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