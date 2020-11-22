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
            <h1 class="m-0 text-dark">Tambah Jenis Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Jenis Produk</li>
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
                  Halaman Tambah Jenis Produk
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH JENIS PRODUK</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">                        
                        <div class="form-group">
                          <label>KODE JENIS PRODUK</label>
                          <input name="kodejenisproduk" type="text" class="form-control" placeholder="Kode Jenis Produk">
                        </div>
                        <div class="form-group">
                          <label>NAMA JENIS PRODUK</label>
                          <input name="namajenisproduk" type="text" class="form-control" placeholder="Nama Jenis Produk">
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
                      $kodejenisproduk = $_POST['kodejenisproduk'];
                      $namajenisproduk = $_POST['namajenisproduk'];
                      
                      $ambil = $conn->query("INSERT INTO t_jproduk (kode_jproduk, namajenis_jproduk)
                        VALUES('$kodejenisproduk', '$namajenisproduk')");

                      echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Berhasil Disimpan</button>";
                      echo "<script> location='jenisproduk.php'; </script>";
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

