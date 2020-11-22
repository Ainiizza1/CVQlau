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
            <h1 class="m-0 text-dark">Tambah Kendaraan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Kendaraan</li>
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
                  Halaman Tambah Kendaraan
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH KENDARAAN</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA</label>
                          <input name="namakendaraan" type="text" class="form-control" required="" placeholder="Nama Kendaraan">
                        </div>
                        <div class="form-group">
                          <label>PLAT</label>
                          <input name="plat" type="text" class="form-control" required="" placeholder="Plat Kendaraan">
                        </div>
                        <div class="form-group">
                          <label>WARNA</label>
                          <input name="warna" type="text" class="form-control" required="" placeholder="Warna Kendaraan">
                        </div>  
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        </div>
                      </form>

                      <?php 
                      if (isset($_POST['tambah'])) 
                      {
                        $namakendaraan = $_POST['namakendaraan'];
                        $plat = $_POST['plat'];
                        $warna = $_POST['warna'];
                      // var_dump($passwordpengguna);die();

                        $ambil = $conn->query("INSERT INTO t_kendaraan (nama_kendaraan, plat, warna)
                          VALUES('$namakendaraan', '$plat', '$warna')");

                        echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Kendaraan Berhasil Ditambahka<n/button>";
                        echo "<script> location='kendaraan.php'; </script>";
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

