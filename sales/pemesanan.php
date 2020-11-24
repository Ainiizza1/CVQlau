  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <script src="jquery.min.js" type="text/javascript"></script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pemesanan</li>
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
                  Halaman Tambah Pemesanan
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PEMESANAN</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA PRODUK</label>
                          <input name="nama" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>JUMLAH PRODUK</label>
                          <input name="jumlah" type="number" class="form-control" required>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="tambah" id="btn-tambah-form">Tambah</button>
                          <button type="submit" class="btn btn-primary" name="reset" id="btn-reset-form">Tambah</
                          </div>
                        </form>

                        <input type="hidden" id="jumlah-form" value="1">

                        <script>
                      $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
                          var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                          var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
                          
                          // Kita akan menambahkan form dengan menggunakan append
                          // pada sebuah tag div yg kita beri id insert-form
                          $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
                            "<form method="post" enctype="multipart/form-data">" +
                            "<div class="card-body">"
                            "<div class="form-group">"+
                            "<label>NAMA PRODUK</label>"+
                            "<input name="nama" type="text" class="form-control" required>"+
                            "</div>+"
                            "<div class="form-group">"+
                            "<label>JUMLAH PRODUK</label>"+
                            "<input name="jumlah" type="number" class="form-control" required>"+
                            "</div>"+
                            "</form>"+
                            "<br><br>");
                          
                          $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
                        });
                        
                        // Buat fungsi untuk mereset form ke semula
                        $("#btn-reset-form").click(function(){
                          $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                          $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
                        });
                      });
                    </script>

                    <?php 
                    if (isset($_POST['tambah'])) 
                    {
                      $namakendaraan = $_POST['namakendaraan'];
                      $plat = $_POST['plat'];
                      $warna = $_POST['warna'];
                      // var_dump($passwordpengguna);die();

                      $ambil = $conn->query("INSERT INTO t_pemesanan (nama_kendaraan, plat, warna)
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

