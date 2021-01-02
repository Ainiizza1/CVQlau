  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  
  $id_sales = $_GET["id"];

  $result = mysqli_query($conn,"SELECT * FROM t_sales JOIN t_users WHERE id_sales=$id_sales");
  $sales = mysqli_fetch_assoc($result);

  if (isset($_POST['ubah'])) 
  {
    $data = [
      'id_sales'=> $id_sales,
      'id_kendaraan'=> $_POST['id_kendaraan'],
      'nik'=> $_POST['nik'],
      'nama_sales'=> $_POST['nama_sales'],
      'foto'=> $_POST['foto'],
      'alamat'=> $_POST['alamat'],
      'id_user'=> $_POST['id_user']
    ];
    // var_dump($data);die();  
    if (ubahsales($data) > 0) {
      echo "<script>
      alert('Data Sales Berhasil Diubah');
      document.location.href = 'sales.php';
      </script>";
    } else {
      echo "<script>
      alert('Data Sales Berhasil Diubah');
      document.location.href = 'sales.php';
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
            <h1 class="m-0 text-dark">Ubah Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Sales</li>
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
                  Halaman Ubah Sales
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH SALES</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>NIK</label>
                          <input name="nik" type="text" class="form-control" required="" value="<?= $sales["nik"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input name="nama_sales" type="text" class="form-control" required="" value="<?= $sales["nama_sales"]; ?>">
                        </div>  
                        <div class="form-group">
                          <img src="../img/<?php echo $sales["foto"] ?>" width=200>
                          <div class="form-group">
                            <label>Ganti Foto</label>
                            <input type="file" class="form-control" name="foto">
                          </div>
                        </div>  
                        <div class="form-group">
                          <label>Alamat</label>
                          <input name="alamat" type="text" class="form-control" required="" value="<?= $sales["alamat"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>No Kendaraan</label>
                          <select class="form-control selectlive" name="id_kendaraan">
                            <?php foreach ($kendaraan as $nokendaraan) : ?>
                              <option selected disabled><?php echo $nokendaraan['plat'] ?></option>
                              <option value="<?php echo $nokendaraan['id_kendaraan'] ?>"><?php echo $nokendaraan['plat'] ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                      </div>    
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" required="" value="<?= $sales["username"]; ?>">
                      </div>    
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                      </div>    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
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

