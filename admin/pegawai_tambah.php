  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_pegawai.php');  
  

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pegawai</li>
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
                  Halaman Tambah Pegawai
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PEGAWAI</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA</label>
                          <input name="namapeg" type="text" class="form-control" required="" placeholder="Nama Pegawai">
                        </div><div class="form-group">
                          <label>NO TELEPON</label>
                          <input name="notelpeg" type="text" class="form-control" required="" placeholder="No Telepon">
                        </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>LEVEL USER</label>
                          <select class="form-control selectlive" name="levelpeg" required>
                            <option value="">Silahkan Dipilih</option>
                            <option value="gudang">Bagian Gudang</option>
                            <option value="keuangan">Bagian Keuangan</option>
                            <option value="pemilik">Pemilik</option>
                          </select>
                        </div>    
                        <div class="form-group">
                          <label>USERNAME</label>
                          <input name="username" type="text" class="form-control" required="" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <label>PASSWORD</label>
                          <input name="password" type="password" class="form-control" required="" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label>STATUS</label>
                          <select class="form-control selectlive" name="statuspeg" required>
                            <option value="">Silahkan Dipilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
                        </div>  

                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        </div>
                      </form>

                      <?php 
                      if (isset($_POST['tambah'])) 
                      {
                       $nama = $_FILES['foto']['name'];
                       $lokasi = $_FILES['foto']['tmp_name'];
                       move_uploaded_file($lokasi, "../img/".$nama);

                       $namalengkap = $_POST['namapeg'];
                       $telp = $_POST['notelpeg'];
                       $username = $_POST['username'];
                       $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                       $level = $_POST['levelpeg'];
                       $status = $_POST['statuspeg'];

                       $insert_user =  $conn->query("INSERT INTO t_users (username, password, level, status) VALUES ('$username','$password','$level','1')");
                       if ($insert_user) {
                        $user_terakhir =  $conn->query("SELECT * FROM t_users ORDER BY id DESC limit 1");
                        $id_user = $user_terakhir->fetch_assoc()['id'];
                        $insert_pegawai = $conn->query("INSERT INTO t_pegawai (nama_lengkap, telp, id_user, foto)
                          VALUES('$namalengkap','$telp','$id_user','$nama')");
                        if ($insert_pegawai) {
                          echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Pegawai Berhasil Ditambahka<n/button>";
                          echo "<script> location='pegawai.php'; </script>";
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

