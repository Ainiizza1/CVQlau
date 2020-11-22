  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  
  $id_pelanggan = $_GET["id"];

  $result = mysqli_query($conn,"SELECT * FROM t_pelanggan WHERE id_pelanggan=$id_pelanggan");
  $pelanggan = mysqli_fetch_assoc($result);
  // var_dump($produk);
  
  if (isset($_POST['ubah'])) 
  {
    $data = [
      'idpelanggan'=>$id_pelanggan,
      'kodepelanggan'=>$_POST['kodepelanggan'],
      'namapelanggan'=>$_POST['namapelanggan'],
      'alamat'=>$_POST['alamat'],
      'nohp'=>$_POST['nohp'],
      'kecamatan'=>$_POST['kecamatan'],
      'latitude'=>$_POST['latitude'],
      'longitude'=>$_POST['longitude'],
      'kota'=>$_POST['kota'],
      'status'=>$_POST['status']
    ];
    // var_dump($data);die();  
    if (ubahpelanggan($data) > 0) {
      echo "<script>
      alert('Data Pelanggan Berhasil Diubah');
      document.location.href = 'pelanggan.php';
      </script>";
    } else {
      echo "<script>
      alert('Data Pelanggan Berhasil Diubah');
      document.location.href = 'Pelanggan.php';
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
            <h1 class="m-0 text-dark">Ubah Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Pelanggan</li>
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
                  Halaman Ubah Pelanggan
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PELANGGAN</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <label>KODE PELANGGAN</label>
                          <select class="form-control selectlive" name="kodepelanggan" required>
                            <option disabled>Silahkan Dipilih</option>
                            <option <?=($pelanggan['kode_pelanggan']=="PELB")?'selected':''?> value="PELB">Pelanggan Bekasi</option>
                            <option <?=($pelanggan['kode_pelanggan']=="PELK")?'selected':''?> value="PELK">Pelanggan Karawang</option>
                            <option <?=($pelanggan['kode_pelanggan']=="PELC")?'selected':''?> value="PELC">Pelanggan Cikarang</option>
                            <option <?=($pelanggan['kode_pelanggan']=="PELJ")?'selected':''?> value="PELJ">Pelanggan Jakarta</option>
                            <option <?=($pelanggan['kode_pelanggan']=="PELJB")?'selected':''?> value="PELJB">Pelanggan Jawa Barat</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>NAMA PELANGGAN</label>
                          <input name="namapelanggan" type="text" class="form-control" value="<?= $pelanggan["nama_pelanggan"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>ALAMAT</label>
                          <input name="alamat" type="text" class="form-control" value="<?= $pelanggan["alamat_pelanggan"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>KOTA</label>
                          <input name="kota" type="text" class="form-control" value="<?= $pelanggan["kota"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>KECAMATAN</label>
                          <input name="kecamatan" type="text" class="form-control" value="<?= $pelanggan["kecamatan"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>NO HP/TELP</label>
                          <input name="nohp" type="text" class="form-control" value="<?= $pelanggan["telepon_pelanggan"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>LATITUDE</label>
                          <input name="latitude" type="text" class="form-control" value="<?= $pelanggan["telepon_pelanggan"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>LONGITUDE</label>
                          <input name="longitude" type="text" class="form-control" value="<?= $pelanggan["telepon_pelanggan"]; ?>">
                        </div>  
                        <div class="form-group">
                          <label>STATUS</label>
                          <input name="status" type="text" class="form-control" value="<?= $pelanggan["status"]; ?>">
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

