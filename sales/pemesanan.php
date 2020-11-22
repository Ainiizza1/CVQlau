  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pemesanan Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Pemesanan Produk</li>
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
                  Halaman Pemesanan Produk
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">PEMESANAN PRODUK</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA PRODUK</label>
                          <select class="form-control selectlive" name="namaproduk" required>
                            <option value="">Silahkan Dipilih</option>
                            <?php foreach ($dataproduk as $produk) : ?>
                              <option value="<?php echo $produk['nama_produk'] ?>">
                                <?php echo $produk['nama_produk'] ?>
                              </option> 
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>JUMLAH PEMESANAN PRODUK</label>
                          <input name="jumlahpesan" type="number" class="form-control" placeholder="jumlahpesan">
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
                      // $namaproduk = $_POST['namaproduk'];
                      // $jumlahpesan = $_POST['jumlahpesan'];

                      // $ambil = $conn->query("INSERT INTO t_pemesanan (nama, nama_produk, harga_produk)
                      //   VALUES('$kode', '$namaproduk', '$hargaproduk')");

                      // echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Berhasil Disimpan</button>";
                      // echo "<script> location='produk.php'; </script>";
                    } 

                    ?>

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

