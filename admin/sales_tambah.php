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
            <h1 class="m-0 text-dark">Tambah Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Sales</li>
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
                  Halaman Tambah Sales
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH SALES</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>NIK</label>
                          <input name="nik" type="text" class="form-control" required="" placeholder="NIK Sales">
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input name="nama_sales" type="text" class="form-control" required="" placeholder="Nama Sales">
                        </div>  
                        <div class="form-group">
                          <label>Alamat</label>
                          <input name="alamat" type="text" class="form-control" required="" placeholder="Alamat Sales">
                        </div>  
                        <!-- <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control" required="">
                        </div>   -->
                        <div class="form-group">
                          <label>No Kendaraan</label>
                          <select class="form-control selectlive" name="nokendaraan" required>
                            <option selected disabled>Silahkan Dipilih</option>
                            <?php foreach ($kendaraan as $nokendaraan) : ?>
                              <option value="<?php echo $nokendaraan['id_kendaraan'] ?>"><?php echo $nokendaraan['plat'] ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                      </div>    
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" required="" placeholder="Username">
                      </div>    
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" required="" placeholder="Password">
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
                    $nik = $_POST['nik'];
                    $namalengkap = $_POST['nama_sales'];
                    $alamat = $_POST['alamat'];
                      // $foto = $_POST['foto'];
                    $kendaraan = $_POST['nokendaraan'];
                      $username = $_POST['username'];
                      $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

                      $insert_user =  $conn->query("INSERT INTO t_users (username, password, level, status) VALUES ('$username','$password','sales','1')");
                    if ($insert_user) {
                      $user_terakhir =  $conn->query("SELECT * FROM t_users ORDER BY id DESC limit 1");
                      $id_user = $user_terakhir->fetch_assoc()['id'];
                      $insert_sales = $conn->query("INSERT INTO t_sales (nik, nama_sales, alamat, id_kendaraan,id_user)
                      VALUES('$nik','$namalengkap','$alamat','$kendaraan','$id_user' )");
                      if ($insert_sales) {
                        echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Sales Berhasil Ditambahka<n/button>";
                        echo "<script> location='sales.php'; </script>";
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

