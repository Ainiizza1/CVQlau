  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_profil.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $id_sales = $_GET["id"];

  $profil = profil_sales();

  if (isset($_POST['ubah'])) 
  {

    $data = [
      'id_sales'=> $_POST['id_sales'],
      'id_profil'=> $_POST['id'],
      'password'=> password_hash($_POST['passwordbaru'],PASSWORD_DEFAULT)

    ];

    // var_dump($data);die;
    if (ubahpassprofil($data) > 0) {
      echo "<script>
      alert('Data Password Profil Berhasil Diubah');
      document.location.href = 'profil.php';
      </script>";
    } else {
      echo "<script>
      alert('Data Password Profil Gagal Diubah');
      document.location.href = 'profil.php';
      </script>";
      echo mysqli_error($conn);
    }
  } 
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Password Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Password Profil</li>
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
                  Halaman Ubah Password Profil 
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PASSWORD PROFIL</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>Password Lama</label>
                          <input name="passwordlama" type="password" class="form-control" required value="<?= $profil["password"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>Password Baru </label>
                          <input name="passwordbaru" type="password" class="form-control" required>
                        </div>  
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <input name="id" type="hidden" class="form-control" placeholder="id" value="<?= $profil["id"]; ?>">
                          <input name="id_sales" type="hidden" class="form-control" placeholder="id" value="<?= $profil["id_sales"]; ?>">
                          <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
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

