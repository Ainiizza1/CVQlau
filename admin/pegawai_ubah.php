  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_pegawai.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  
  $id_pegawai = $_GET["id"];
  $result = mysqli_query($conn,"SELECT * FROM t_users JOIN t_pegawai ON t_users.id = t_pegawai.id_user WHERE id_pegawai=$id_pegawai");
  $pegawai = mysqli_fetch_assoc($result);

  if (isset($_POST['ubah'])) 
  {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    
    $data = [
      'id_pegawai'=> $id_pegawai,
      'id_user'=> $_POST['id_user'],
      'nama_lengkap'=> $_POST['namapeg'],
      'telp'=> $_POST['notelpeg'],
      'foto'=> $nama_foto,
      'level'=> $_POST['levelpeg'],
      'username'=> $_POST['username'],
      'status'=> $_POST['statuspeg'],
      'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT)
    ];

    if (ubahpegawai($data) > 0) {
      move_uploaded_file($lokasi, "../img/".$nama_foto);

      echo "<script>
      alert('Data Pegawai Berhasil Diubah');
      document.location.href = 'pegawai_detail.php?id=$id_pegawai';
      </script>";
    } else {
      echo "<script>
      alert('Data Pegawai Gagal Diubah');
      document.location.href = 'pegawai_detail.php?id=$id_pegawai';
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
            <h1 class="m-0 text-dark">Ubah Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Pegawai</li>
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
                  Halaman Ubah Pegawai
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PEGAWAI</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">

                        <div class="form-group">
                          <label>NAMA</label>
                          <input name="namapeg" type="text" required class="form-control" value="<?= $pegawai["nama_lengkap"]; ?>">
                        </div><div class="form-group">
                          <label>NO TELEPON</label>
                          <input name="notelpeg" type="text" required class="form-control" value="<?= $pegawai["telp"]; ?>">
                        </div>
                        <div class="form-group">
                          <img src="../img/<?php echo $pegawai["foto"] ?>" width=200>
                          <label>Foto</label>
                          <input name="foto" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>LEVEL USER</label>
                          <select class="form-control selectlive" required name="levelpeg">
                            <option disabled>Silahkan Dipilih</option>
                            <option <?=($pegawai['level']=="gudang")?'selected':''?> value="gudang">Bagian Gudang</option>
                            <option <?=($pegawai['level']=="keuangan")?'selected':''?> value="keuangan">Bagian Keuangan</option>
                            <option <?=($pegawai['level']=="pemilik")?'selected':''?> value="pemilik">Pemilik</option>
                          </select>
                        </div>  
                        <div class="form-group">
                          <label>USERNAME</label>
                          <input name="username" type="text" class="form-control" required value="<?= $pegawai["username"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>PASSWORD</label>
                          <input name="password" type="password" class="form-control" required value="<?= $pegawai["password"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>STATUS</label>
                          <select class="form-control selectlive" required name="statuspeg" >
                            <option value="">Silahkan Dipilih</option>
                            <option <?=($pegawai['status']=="1")?'selected':''?> value="1">Aktif</option>
                            <option <?=($pegawai['status']=="0")?'selected':''?> value="0">Tidak Aktif</option>
                          </select>
                        </div>  

                        <!-- /.card-body -->
                        <div class="card-footer">
                          <input name="id_user" type="hidden" class="form-control" placeholder="id_user" value="<?= $pegawai["id_user"]; ?>">
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

