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
    $nama_foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    $data = [
      'id_sales'=> $_POST['id_sales'],
      'id_profil'=> $_POST['id'],
      'nama_sales'=> $_POST['nama'],
      'foto'=> $nama_foto,
      'username'=> $_POST['username']

    ];

    // var_dump($data);die;
    if (ubahprofil($data) > 0) {
      move_uploaded_file($lokasi, "../img/".$nama_foto);

      echo "<script>
      alert('Data Profil Berhasil Diubah');
      document.location.href = 'profil.php';
      </script>";
    } else {
      echo "<script>
      alert('Data Profil Gagal Diubah');
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
            <h1 class="m-0 text-dark">Ubah Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Profil</li>
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
                  Halaman Ubah Profil
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PROFIL</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nama User</label>
                          <input name="nama" type="text" class="form-control" required="" value="<?= $profil["nama_sales"]; ?>">
                        </div>    
                        <div class="form-group">
                          <label>Username</label>
                          <input name="username" type="text" class="form-control" required="" value="<?= $profil["username"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>Foto</label><br>
                          <img src="../img/<?php echo $profil["foto"] ?>" width=200>  
                          <input name="foto" type="file" class="form-control">
                        </div>
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

