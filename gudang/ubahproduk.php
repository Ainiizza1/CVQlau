  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  
  $id_produk = $_GET["id"];

  $result = mysqli_query($conn,"SELECT * FROM t_produk WHERE id_produk=$id_produk");
  $produk = mysqli_fetch_assoc($result);
  // var_dump($produk);
  
  if (isset($_POST['ubah'])) 
  {
    $data = [
      'id_produk'=>$id_produk,
      'kode_produk'=>$_POST['kodeproduk'],
      'nama_produk'=>$_POST['namaproduk'],
      'harga_produk'=>$_POST['hargaproduk']
    ];
    // var_dump($data);die();  
    if (ubahproduk($data) > 0) {
      echo "<script>
      alert('data berhasil diubah');
      document.location.href = 'produk.php';
      </script>";
    } else {
      echo "<script>
      alert('data gagal diubah');
      document.location.href = 'produk.php';
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
            <h1 class="m-0 text-dark">Ubah Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Produk</li>
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
                  Halaman Ubah Produk
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">UBAH PRODUK</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post">
                      <div class="card-body">

                        <div class="form-group">
                          <label>KODE PRODUK</label>
                          <input name="kodeproduk" type="text" class="form-control" placeholder="Kode Produk" value="<?= $produk['kode_produk'] ?>">
                        </div>
                        
                        <div class="form-group">
                          <label>NAMA PRODUK</label>
                          <input name="namaproduk" type="text" class="form-control" placeholder="Nama Produk" value="<?= $produk["nama_produk"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>HARGA PRODUK</label>
                          <input name="hargaproduk" type="text" class="form-control" placeholder="Harga Produk" value="<?= $produk["harga_produk"]; ?>">
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

