  <?php
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_produk.php');
  require_once('../drp.php');

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kebutuhan Distribusi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kebutuhan Distribusi</li>
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
                  Halaman Kebutuhan Distribusi
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <h3>Data Penjualan</h3>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="20px">No</th>
                      <th>Tanggal</th>
                      <th>Jumlah Setoran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomor = 1;
                    $ambil = $conn->query("SELECT * FROM t_penjualan JOIN t_users ON t_penjualan.id_sales = t_users.id JOIN t_sales ON t_sales.id_user = t_users.id WHERE level='sales'");
                    $data_masukkan = array();
                    while ($pecah = $ambil->fetch_assoc()) {
                      $data_masukkan[] = array(
                        'tanggal' => $pecah['tgl_setor'],
                        'setoran' => $pecah['jumlah_setor']
                      );
                    ?>
                      <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($pecah['tgl_setor'])); ?></td>
                        <td><?php echo $pecah['jumlah_setor']; ?></td>
                      </tr>
                    <?php
                      $nomor++;
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>

            <?php
            $move = 2;
            $drp = gross_requirement($data_masukkan, $move);
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <h3>Data Penjualan</h3>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Hari</td>
                      <td>Jumlah Pemesanan /Hari (Pcs)</td>
                      <td>MA 2 Hari</td>
                      <td>Error</td>
                      <td>Absolut Error</td>
                      <td>Squared Error</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data_masukkan as $dm) {
                    ?>
                      <tr>
                        <td><?= $no + 1; ?></td>
                        <td><?= date('d-m-Y', strtotime($dm['tanggal'])); ?></td>
                        <td><?= $dm['setoran']; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp['ma'][$no - $move]) ? number_format($drp['ma'][$no - $move], 2, ',', '') : $drp['ma'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp['error'][$no - $move]) ? number_format($drp['error'][$no - $move], 2, ',', '') : $drp['error'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp['absolut_error'][$no - $move]) ? number_format($drp['absolut_error'][$no - $move], 2, ',', '') : $drp['absolut_error'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp['squared_error'][$no - $move]) ? number_format($drp['squared_error'][$no - $move], 2, ',', '') : $drp['squared_error'][$no - $move] : ''; ?></td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                    <tr>
                      <td colspan="4">Total</td>
                      <td><?= is_float(array_sum($drp['error'])) ? number_format(array_sum($drp['error']), 2, ',', '') : array_sum($drp['error']); ?></td>
                      <td><?= is_float(array_sum($drp['absolut_error'])) ? number_format(array_sum($drp['absolut_error']), 2, ',', '') : array_sum($drp['absolut_error']); ?></td>
                      <td><?= is_float(array_sum($drp['squared_error'])) ? number_format(array_sum($drp['squared_error']), 2, ',', '') : array_sum($drp['squared_error']); ?></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Error</td>
                      <td><?= is_float($drp['mean_error']) ? number_format($drp['mean_error'], 2, ',', '') : $drp['mean_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Absolut Error</td>
                      <td><?= is_float($drp['mean_absolut_error']) ? number_format($drp['mean_absolut_error'], 2, ',', '') : $drp['mean_absolut_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Squared Error</td>
                      <td><?= is_float($drp['mean_squared_error']) ? number_format($drp['mean_squared_error'], 2, ',', '') : $drp['mean_squared_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <?php
                $next_date = new DateTime(end($data_masukkan)['tanggal']);
                $next_date->modify('+1 day');
                ?>
                <p class="mt-3">Peralaman Untuk Tanggal <b><?= $next_date->format('d-m-Y'); ?></b> adalah <b><?= number_format($drp['peramalan'], 0, ',', '.'); ?></b></p>
              </div>
            </div>

            <?php
            $move = 3;
            $drp1 = gross_requirement($data_masukkan, $move);
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <h3>Data Penjualan</h3>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Hari</td>
                      <td>Jumlah Pemesanan /Hari (Pcs)</td>
                      <td>MA 2 Hari</td>
                      <td>Error</td>
                      <td>Absolut Error</td>
                      <td>Squared Error</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data_masukkan as $dm) {
                    ?>
                      <tr>
                        <td><?= $no + 1; ?></td>
                        <td><?= date('d-m-Y', strtotime($dm['tanggal'])); ?></td>
                        <td><?= $dm['setoran']; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp1['ma'][$no - $move]) ? number_format($drp1['ma'][$no - $move], 2, ',', '') : $drp1['ma'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp1['error'][$no - $move]) ? number_format($drp1['error'][$no - $move], 2, ',', '') : $drp1['error'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp1['absolut_error'][$no - $move]) ? number_format($drp1['absolut_error'][$no - $move], 2, ',', '') : $drp1['absolut_error'][$no - $move] : ''; ?></td>
                        <td><?= $no > $move - 1 ? is_float($drp1['squared_error'][$no - $move]) ? number_format($drp1['squared_error'][$no - $move], 2, ',', '') : $drp1['squared_error'][$no - $move] : ''; ?></td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                    <tr>
                      <td colspan="4">Total</td>
                      <td><?= is_float(array_sum($drp1['error'])) ? number_format(array_sum($drp1['error']), 2, ',', '') : array_sum($drp1['error']); ?></td>
                      <td><?= is_float(array_sum($drp1['absolut_error'])) ? number_format(array_sum($drp1['absolut_error']), 2, ',', '') : array_sum($drp1['absolut_error']); ?></td>
                      <td><?= is_float(array_sum($drp1['squared_error'])) ? number_format(array_sum($drp1['squared_error']), 2, ',', '') : array_sum($drp1['squared_error']); ?></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Error</td>
                      <td><?= is_float($drp1['mean_error']) ? number_format($drp1['mean_error'], 2, ',', '') : $drp1['mean_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Absolut Error</td>
                      <td><?= is_float($drp1['mean_absolut_error']) ? number_format($drp1['mean_absolut_error'], 2, ',', '') : $drp1['mean_absolut_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">Mean Squared Error</td>
                      <td><?= is_float($drp1['mean_squared_error']) ? number_format($drp1['mean_squared_error'], 2, ',', '') : $drp1['mean_squared_error']; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <?php
                $next_date = new DateTime(end($data_masukkan)['tanggal']);
                $next_date->modify('+1 day');
                ?>
                <p class="mt-3">Peralaman Untuk Tanggal <b><?= $next_date->format('d-m-Y'); ?></b> adalah <b><?= $drp1['peramalan']; ?></b></p>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tabel Hasil Hasil Penghitungan DRP
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <h3>Data Penjualan</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <td>Safety Stock</td>
                      <td>Past Due</td>
                      <td><?= $next_date->format('d-m-Y'); ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gross Requirements</td>
                      <td></td>
                      <td><?= $drp['peramalan']; ?></td>
                    </tr>
                    <tr>
                      <td>Schedule Receipts</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Projected On Hand</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Net Requirements</td>
                      <td></td>
                      <td><?= $drp['net_requirements']; ?></td>
                    </tr>
                    <tr>
                      <td>Planned Order Receipt</td>
                      <td></td>
                      <td><?= $drp['planned_order_receipt']; ?></td>
                    </tr>
                    <tr>
                      <td>Planned Order Release</td>
                      <td></td>
                      <td><?= $drp['planned_order_receipt']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include_once('_partials/bawah.php'); ?>