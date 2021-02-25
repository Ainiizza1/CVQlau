<html>

<head>
  <script src="jquery.min.js" type="text/javascript"></script>
</head>

<body>

  <?php
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_pemesanan.php');

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  $jenisproduk = tampil_produk();
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pemesanan</li>
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
                <a href="pemesanan.php" class="btn btn-default btn-sm">Kembali</a>

                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TAMBAH PEMESANAN</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data">
                      <div class="card-body ">
                        <div class="row">
                          <div class="form-group col-8">
                            <label>NAMA PRODUK</label>
                            <select class="form-control selectlive" name="namaproduk[]" required>
                              <option selected disabled>Silahkan Dipilih</option>
                              <?php foreach ($jenisproduk as $jproduk) : ?>
                                <option value="<?php echo $jproduk['id_produk'] ?>"><?php echo $jproduk['nama_produk'] ?>
                                </option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          <div class="form-group col-4">
                            <label>JUMLAH PRODUK</label>
                            <input name="jumlah[]" type="number" class="form-control" required>
                          </div>
                          <input type="hidden" name="id_sales" value="<?php echo $id_sales ?>">
                        </div>
                        <div id="insert-form"></div>
                      </div>
                      <!-- /.card-body -->


                      <div class="card-footer">
                        <button type="button" id="btn-tambah-form">Tambah Data Form</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        <button type="submit" class="btn btn-primary" name="reset" id="btn-reset-form">Reset</button>
                      </div>
                    </form>

                    <script>
                      $(document).ready(function() {
                        $('#btn-tambah-form').click(function() {
                          console.log('halo');
                          $('#insert-form').append(
                            "<div class='row'>" +
                            "<div class='form-group col-8'>" +
                            "<label>NAMA PRODUK</label>" +
                            "<select class='form-control selectlive' name='namaproduk[]' required>" +
                            "<option selected disabled>Silahkan Dipilih</option>" +
                            "<?php foreach ($jenisproduk as $jproduk) : ?>" +
                            "<option value='<?php echo $jproduk['id_produk'] ?>'><?php echo $jproduk['nama_produk'] ?>" +
                            "</option>" +
                            "<?php endforeach ?>" +
                            "</select>" +
                            "</div>" +
                            "<div class='form-group col-4'>" +
                            "<label>JUMLAH PRODUK</label>" +
                            "<input name='jumlah[]' type='number' class='form-control' required>" +
                            "</div></div>"
                          );
                        });
                        // Buat fungsi untuk mereset form ke semula
                        $("#btn-reset-form").click(function() {
                          $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                        });
                      });
                    </script>

                    <?php
                    if (isset($_POST['tambah'])) {
                      // var_dump($_POST);die();
                      $jumlah_data = count($_POST['namaproduk']);
                      // var_dump($jumlah_data);die();
                      $id_sales = $_SESSION['id'];
                      // var_dump($id_sales);
                      $tgl_pesan = date("Y-m-d h:i:s");
                      $status = "Belum Dikonfirmasi";
                      $ambil = $conn->query("INSERT INTO t_pemesanan (id_sales,tgl_pemesanan,status)
                        VALUES('$id_sales','$tgl_pesan', '$status')");
                      if ($ambil == true) {
                        $result = mysqli_query($conn, "SELECT id_pemesanan FROM t_pemesanan ORDER BY id_pemesanan DESC LIMIT 1");
                        $id_pemesanan = $result->fetch_assoc()['id_pemesanan'];
                        for ($i = 0; $i < $jumlah_data; $i++) {
                          $id_pemesanan = $id_pemesanan;
                          $namaproduk = $_POST['namaproduk'][$i];
                          $jumlah = $_POST['jumlah'][$i];

                          $ambil = $conn->query("INSERT INTO t_detail_pemesanan (id_pemesanan,id_produk,qty_ambil)
                            VALUES('$id_pemesanan','$namaproduk','$jumlah')");
                          if ($ambil == false) {
                            echo "Error Detail : " . mysqli_error($conn);
                          }
                        }
                      } else {
                        echo "Error : " . mysqli_error($conn);
                      }

                      // var_dump(mysql_error());die();

                      echo "<button type='button' class='btn btn-success toastrDefaultSuccess'>Data Pemesanan Berhasil Ditambahkan</button>";
                      echo "<script> location='pemesanan.php'; </script>";
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

</body>

</html>