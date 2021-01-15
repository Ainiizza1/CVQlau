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
            <h1 class="m-0 text-dark">Tambah Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pelanggan</li>
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
                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Halaman Tambah Pelanggan</h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PELANGGAN</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <label>KODE</label>
                          <select class="form-control selectlive" name="kodepelanggan" required>
                            <option selected disabled>Silahkan Dipilih</option>
                            <option value="PELB">Pelanggan Bekasi</option>
                            <option value="PELK">Pelanggan Karawang</option>
                            <option value="PELC">Pelanggan Cikarang</option>
                            <option value="PELJ">Pelanggan Jakarta</option>
                            <option value="PELJB">Pelanggan Jawa Barat</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>NAMA</label>
                          <input name="namapelanggan" type="text" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                          <label>ALAMAT</label>
                          <input name="alamatpelanggan" type="text" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                          <label>KOTA</label>
                          <input name="kotapelanggan" type="text" class="form-control" placeholder="Kota">
                        </div>
                        <div class="form-group">
                          <label>KECAMATAN</label>
                          <input name="kecamatanpelanggan" type="text" class="form-control" placeholder="Kecamatan">
                        </div>
                        <div class="form-group">
                          <label>NO HP / TELP</label>
                          <input name="nohppelanggan" type="text" class="form-control" placeholder="No Hp / Telp">
                        </div>
                        <div class="form-group">
                          <label>Username</label>
                          <input name="username" type="text" class="form-control" required="" placeholder="Username">
                        </div>    
                        <div class="form-group">
                          <label>Password</label>
                          <input name="password" type="password" class="form-control" required="" placeholder="Password">
                        </div>    
                        <div class="form-group">
                          <label>STATUS</label>
                          <select class="form-control selectlive" name="statuspelanggan" required>
                            <option selected disabled>Silahkan Dipilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
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
                      // var_dump($_POST);die();
                      $kodepelanggan = $_POST['kodepelanggan'];
                      $namapelanggan = $_POST['namapelanggan'];
                      $alamatpelanggan = $_POST['alamatpelanggan'];
                      $kotapelanggan = $_POST['kotapelanggan'];
                      $kecamatanpelanggan = $_POST['kecamatanpelanggan'];
                      $nohppelanggan = $_POST['nohppelanggan'];
                      $statuspelanggan = $_POST['statuspelanggan'];
                      $username = $_POST['username'];
                      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

                      $insert_user =  $conn->query("INSERT INTO t_users (username, password, level, status) VALUES ('$username','$password','pelanggan','1')");

                      if ($insert_user) {
                        $user_terakhir =  $conn->query("SELECT * FROM t_users ORDER BY id DESC limit 1");
                        $id_user = $user_terakhir->fetch_assoc()['id'];

                        $insert_sales = $conn->query("INSERT INTO t_pelanggan (kode_pelanggan, nama_pelanggan, alamat_pelanggan, kota, kecamatan, telepon_pelanggan, status, id_user)

                          VALUES('$kodepelanggan', '$namapelanggan', '$alamatpelanggan', '$kotapelanggan', '$kecamatanpelanggan', '$nohppelanggan', '$statuspelanggan', '$id_user')");
                        if ($insert_sales) {
                          echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Pelanggan Berhasil Ditambahka<n/button>";
                          echo "<script> location='pelanggan.php'; </script>";
                        } else {
                          echo mysqli_error($conn);
                        }
                      } else{
                        echo mysqli_error($conn);
                      }
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

