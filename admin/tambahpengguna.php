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
            <h1 class="m-0 text-dark">Tambah Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                  Halaman Tambah Pengguna
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PENGGUNA</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA</label>
                          <input name="namapengguna" type="text" class="form-control" required="" placeholder="Nama Pengguna">
                        </div>
                        <div class="form-group">
                          <label>USERNAME</label>
                          <input name="usernamepengguna" type="text" class="form-control" required="" placeholder="Username Pengguna">
                        </div>
                        <div class="form-group">
                          <label>PASSWORD</label>
                          <input name="passwordpengguna" type="password" class="form-control" required="" placeholder="Password Pengguna">
                        </div>  
                        <div class="form-group">
                          <label>LEVEL USER</label>
                          <select class="form-control selectlive" name="levelpengguna" required>
                            <option value="">Silahkan Dipilih</option>
                            <option value="sales">Sales</option>
                            <option value="gudang">Bagian Gudang</option>
                            <option value="keuangan">Bagian Keuangan</option>
                            <option value="pemilik">Pemilik</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>  
                        <div class="form-group">
                          <label>STATUS</label>
                          <select class="form-control selectlive" name="statuspengguna" required>
                            <option value="">Silahkan Dipilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
                        </div>  
                        <div class="form-group">
                          <label>FOTO</label>
                          <input name="foto" type="file" class="form-control" required>
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
                      // var_dump($_FILES);die();
                      $nama = $_FILES['foto']['name'];
                      $temp = $_FILES['foto']['tmp_name'];
                      $lokasi_upload = "assets/dist/img/";
                      move_uploaded_file($temp,$lokasi_upload.$nama );

                      $namapengguna = $_POST['namapengguna'];
                      $usernamepengguna = $_POST['usernamepengguna'];
                      $passwordpengguna = password_hash($_POST['passwordpengguna'],PASSWORD_DEFAULT);
                      $levelpengguna = $_POST['levelpengguna'];
                      $statuspengguna = $_POST['statuspengguna'];
                      // var_dump($passwordpengguna);die();

                      $ambil = $conn->query("INSERT INTO t_users (nama, username, password, level, status, foto)
                        VALUES('$namapengguna', '$usernamepengguna', '$passwordpengguna', '$levelpengguna', '$statuspengguna','$foto')");

                      echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Pengguna Berhasil Ditambahka<n/button>";
                      echo "<script> location='pengguna.php'; </script>";
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

