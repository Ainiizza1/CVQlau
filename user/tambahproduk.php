  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('../function.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
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
                  Halaman Tambah Produk
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PRODUK</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">

                        <div class="form-group">
                          <label>KODE PRODUK</label>
                          <select class="form-control selectlive" name="kodeproduk" required>
                            <option selected disabled>Silahkan Dipilih</option>
                            <?php foreach ($jenisproduk as $jproduk) : ?>
                              <option value="<?php echo $jproduk['id_jproduk'] ?>">
                                <?php echo $jproduk['kode_jproduk'] ?> 
                              </option> 
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <input name="kodeangkaproduk" type="hidden" class="form-control" placeholder="Kode Angka Produk" value="<?=kode_produk_berikutnya() ?>">
                        </div>
                        <div class="form-group">
                          <label>KODE ANGKA PRODUK</label>
                          <input type="text" disabled class="form-control" value="<?=kode_produk_berikutnya() ?>">
                        </div>
                        <div class="form-group">
                          <label>NAMA PRODUK</label>
                          <input name="namaproduk" type="text" class="form-control" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                          <label>HARGA PRODUK</label>
                          <input name="hargaproduk" type="text" class="form-control" placeholder="Harga Produk">
                        </div>  
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                      </div>
                    </form>

                    <?php 
                    if (isset($_POST['tambah'])) 
                    {
                      $kodeproduk = $_POST['kodeproduk'];
                      $kodeangkaproduk = $_POST['kodeangkaproduk'];
                      $namaproduk = $_POST['namaproduk'];
                      $hargaproduk = $_POST['hargaproduk'];
                      $kode = $kodeproduk . $kodeangkaproduk;

                      $ambil = $conn->query("INSERT INTO t_produk (kode_produk, nama_produk, harga_produk)
                        VALUES('$kode + $kodeangkaproduk', '$namaproduk', '$hargaproduk')");

                      echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Berhasil Disimpan</button>";
                      echo "<script> location='produk.php'; </script>";
                    } ?>

                  </div>
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

