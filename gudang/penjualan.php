  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penjualan</li>
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
                  Halaman Penjualan Sales
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah Setor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM t_penjualan JOIN t_users ON t_penjualan.id_sales = t_users.id JOIN t_sales ON t_sales.id_user = t_users.id WHERE level='sales'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($pecah['tgl_setor'])); ?></td>
                        <td><?php echo $pecah['jumlah_setor']; ?></td>
                        <td>
                          <a href="penjualan_detail.php?id=<?= $pecah['id_penjualan']; ?>" class="btn-primary btn">Detail</a>
                        </td>
                      </tr>
                      <?php $nomor++ ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Halaman Penjualan Pelanggan
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah Setor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM t_penjualan JOIN t_users ON t_penjualan.id_sales = t_users.id JOIN t_sales ON t_sales.id_user = t_users.id WHERE level='pelanggan'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($pecah['tgl_setor'])); ?></td>
                        <td><?php echo $pecah['jumlah_setor']; ?></td>
                        <td>
                          <a href="penjualan_detail.php?id=<?= $pecah['id_penjualan']; ?>" class="btn-primary btn">Detail</a>
                        </td>
                      </tr>
                      <?php $nomor++ ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </section>
      <!-- /.content -->
      <!-- /.content -->
    </div>

    <?php include_once('_partials/bawah.php'); ?>

