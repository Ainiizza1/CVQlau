  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  
  $id = $_GET["id"];

  $result = mysqli_query($conn,"SELECT * FROM t_users WHERE id=$id");
  $pengguna = mysqli_fetch_assoc($result);
  // var_dump($produk);
  
  if (isset($_POST['ubah'])) 
  {
    $data = [
      'id'=>$id,
      'username'=>$_POST['usernamepengguna'],
      'password'=>$_POST['passwordpengguna'],
      'level'=>$_POST['levelpengguna'],
      'status'=>$_POST['statuspengguna']
    ];
    // var_dump($data);die();  
    if (ubahpengguna($data) > 0) {
      echo "<script>
      alert('Data Pengguna Berhasil Diubah');
      document.location.href = 'pengguna.php';
      </script>";
    } else {
      echo "<script>
      alert('Data Pengguna Gagal Diubah');
      document.location.href = 'pengguna.php';
      </script>";
    }
  } 
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Pengguna</li>
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
                  Halaman Ubah Pengguna
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PENGGUNA</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <label>USERNAME</label>
                          <input name="usernamepengguna" type="text" class="form-control" value="<?= $pengguna['username'] ?>">
                        </div>
                        <div class="form-group">
                          <label>PASSWORD</label>
                          <input name="passwordpengguna" type="password" class="form-control" value="<?= $pengguna['password'] ?>">
                        </div>  
                        <div class="form-group">
                          <label>LEVEL USER</label>
                          <select class="form-control selectlive" name="levelpengguna" required>
                            <option disabled>Silahkan Dipilih</option>
                            <option <?=($pengguna['level']=="sales")?'selected':''?> value="sales">Sales</option>
                            <option <?=($pengguna['level']=="gudang")?'selected':''?> value="gudang">Bagian Gudang</option>
                            <option <?=($pengguna['level']=="keuangan")?'selected':''?> value="keuangan">Bagian Keuangan</option>
                            <option <?=($pengguna['level']=="pemilik")?'selected':''?> value="pemilik">Pemilik</option>
                            <option <?=($pengguna['level']=="pelanggan")?'selected':''?> value="pelanggan">Pelanggan</option>
                            <option <?=($pengguna['level']=="admin")?'selected':''?> value="admin">Admin</option>
                          </select>
                        </div>  
                        <div class="form-group">
                          <label>STATUS</label>
                          <select class="form-control selectlive" name="statuspengguna" required>
                            <option selected disabled>Silahkan Dipilih</option>
                            <option <?=($pengguna['status']=="1")?'selected':''?> value="1">Aktif</option>
                            <option <?=($pengguna['status']=="0")?'selected':''?> value="0">Tidak Aktif</option>
                          </select>
                        </div>  
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
                      </div>
                    </form>

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

