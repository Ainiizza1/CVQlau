  <?php
  session_start();
  include('cek_session.php');
  require_once('../url.php');
  require_once('function_produk.php');
  require_once('../drp.php');

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');

  $tanggal = '2019-11-27';
  $ambil = $conn->query("SELECT t_penjualan.id_penjualan,tgl_setor,SUM(t_detail_penjualan.qty_terjual) jumlah_setor FROM t_penjualan JOIN t_detail_penjualan ON t_penjualan.id_penjualan = t_detail_penjualan.id_penjualan WHERE DATE(t_penjualan.tgl_setor) <= '$tanggal' GROUP BY DATE(t_penjualan.tgl_setor) ORDER BY t_penjualan.tgl_setor DESC LIMIT 6");
  if (isset($_POST['kirim'])) {
    $produk1 = explode('#', $_POST['produk']);
    $tanggal = date('Y-m-d', strtotime($_POST['tanggal'] . '-1 day'));
    $ambil = $conn->query("SELECT t_penjualan.id_penjualan,tgl_setor,SUM(t_detail_penjualan.qty_terjual) jumlah_setor FROM t_penjualan JOIN t_detail_penjualan ON t_penjualan.id_penjualan = t_detail_penjualan.id_penjualan WHERE DATE(t_penjualan.tgl_setor) <= '$tanggal' AND t_detail_penjualan.id_produk = $produk1[0] GROUP BY t_detail_penjualan.id_penjualan ORDER BY t_penjualan.tgl_setor DESC LIMIT 6");
  }
  $baru = array();
  while ($pecah = $ambil->fetch_assoc()) $baru[] = $pecah;
  $urutin = array_column($baru, 'tgl_setor');
  array_multisort($urutin, SORT_ASC, $baru);
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
              <li class="breadcrumb-item"><a href="<?= $url; ?>gudang">Home</a></li>
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
                <form action="" method="post">
                  <div class="row mb-5 mt-3">
                    <div class="col offset-2">
                      <label for="">Jenis Roti</label>
                      <select name="produk" class="form-control" required>
                        <option value="">Pilih Produk</option>
                        <?php
                        $produk = $conn->query("SELECT * FROM t_produk");
                        while ($pecah = $produk->fetch_assoc()) { ?>
                          <option value="<?= $pecah['id_produk']; ?>#<?= $pecah['nama_produk']; ?>"><?= $pecah['nama_produk']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label for="">Tanggal</label>
                      <input type="date" name="tanggal" class="form-control" id="" required>
                    </div>
                    <div class="col">
                      <input type="submit" name="kirim" value="Kirim" class="btn btn-primary" style="margin-top: 32px;">
                    </div>
                  </div>
                </form>
                <?php if (isset($produk1[1])) { ?>
                  <h6 class="mb-3">Jenis Roti : <b><?= $produk1[1]; ?></b></h6>
                <?php } ?>
                <table class="example1 table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="20px">No</th>
                      <th>Tanggal</th>
                      <th>Jumlah Produk</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomor = 1;
                    $data_masukkan = array();
                    for ($i = 0; $i < 6; $i++) {
                      $tgl_setor = date('d-m-Y', strtotime($tanggal . ' -' . abs($i - 5) . ' day'));
                      $status = false;
                      foreach ($baru as $pecah) {
                        if (date('d-m-Y', strtotime($pecah['tgl_setor'])) == $tgl_setor) {
                          $status = true;
                          break;
                        }
                      }
                      $data_masukkan[] = array(
                        'tanggal' => $tgl_setor,
                        'setoran' => $status ? $pecah['jumlah_setor'] : 0
                      );
                    ?>
                      <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo  $tgl_setor; ?></td>
                        <td><?php echo $status ? $pecah['jumlah_setor'] : 0; ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <?php
            $move = 2;
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php
                if ($ambil->num_rows > 2) {
                ?>
                  <h3>Data Penjualan</h3>
                  <table class="example1 table table-bordered table-hover">
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
                      $drp = gross_requirement($data_masukkan, $move);
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
                <?php
                } else {
                ?>
                  <h5 class="text-center">Peralaman tidak bisa dilakukan karena jumlah data kurang dari 3</h5>
                <?php
                }
                ?>
              </div>
            </div>

            <?php
            $move = 3;
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php
                if ($ambil->num_rows > 3) {
                ?>
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
                      $drp1 = gross_requirement($data_masukkan, $move);
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
                <?php
                } else {
                ?>
                  <h5 class="text-center">Peralaman tidak bisa dilakukan karena jumlah data kurang dari 4</h5>
                <?php
                }
                ?>
              </div>
            </div>


            <?php
            if ($ambil->num_rows > 2) {
            ?>

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
            <?php
            }
            ?>
          </section>
        </div>

        <h4 class="mt-4">Analisis Distribusi Produk Kepada Sales</h4>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Halaman Kebutuhan Distribusi Produk Kepada Sales
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <h3>Data Penjualan</h3>

            <?php if (isset($produk1[1])) { ?>
              <h6 class="mb-3">Jenis Roti : <b><?= $produk1[1]; ?></b></h6>
            <?php } ?>
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th rowspan="2" width="20px">No</th>
                  <th rowspan="2">Sales</th>
                  <th colspan="6">Tanggal</th>
                  <th rowspan="2">Total</th>
                  <th rowspan="2">Total Penjualan</th>
                </tr>
                <tr>
                  <?php
                  // $tanggal = $next_date->format('d-m-Y');
                  for ($i = 6; $i > 0; $i--) {
                  ?>
                    <th><?php echo date('d-m-Y', strtotime($tanggal . ' -' . abs($i - 1) . ' day')); ?></th>
                  <?php
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $total_semua = 0;
                $total_hari = array_fill(0, 6, 0);
                $kumpul_datanya = array();
                $ambil = $conn->query("SELECT t_users.id,t_sales.nama_sales,plat FROM t_sales JOIN t_users ON t_users.id = t_sales.id_user JOIN t_kendaraan ON t_kendaraan.id_kendaraan = t_sales.id_kendaraan");
                while ($pecah = $ambil->fetch_assoc()) {
                  $kumpul_datanya[]['sales'] = $pecah;
                  $detail = $conn->query("SELECT t_penjualan.id_penjualan,DATE(tgl_setor) tgl_setor,SUM(t_detail_penjualan.qty_terjual) jumlah_setor FROM t_penjualan JOIN t_detail_penjualan ON t_penjualan.id_penjualan = t_detail_penjualan.id_penjualan WHERE DATE(t_penjualan.tgl_setor) <= '$tanggal' AND t_penjualan.id_sales = '" . $pecah['id'] . "' GROUP BY t_detail_penjualan.id_penjualan ORDER BY t_penjualan.tgl_setor DESC LIMIT 6");
                  $data = array();
                  while ($isi_detail = $detail->fetch_assoc()) $data[] = $isi_detail;
                  $total = 0;
                  for ($i = 6; $i > 0; $i--) {
                    $status = false;
                    foreach ($data as $datas) {
                      if ($datas['tgl_setor'] == date('Y-m-d', strtotime($tanggal . ' -' . $i . ' day'))) {
                        $status = true;
                        $total += $datas['jumlah_setor'];
                        $total_semua += $datas['jumlah_setor'];
                        break;
                      }
                    }
                    if ($status) {
                      $kumpul_datanya[$no]['detail'][] = $datas['jumlah_setor'];
                      $total_hari[abs($i - 6)] += $datas['jumlah_setor'];
                    } else {
                      $kumpul_datanya[$no]['detail'][] = 0;
                      $total_hari[abs($i - 6)] += 0;
                    }
                    $kumpul_datanya[$no]['total'] = $total;
                  }
                  $no++;
                }
                $no = 1;
                $total_persen = array();
                foreach ($kumpul_datanya as $kd) :
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $kd['sales']['nama_sales']; ?></td>
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                    ?>
                      <td><?php echo $kd['detail'][$i]; ?></td>
                    <?php
                    }
                    ?>
                    <td><?php echo $kd['total']; ?></td>
                    <td><?php echo $kd['total'] > 0 ? $total_persen[] =  round(($kd['total'] / $total_semua) * 100, 2) : $total_persen[] = 0; ?>%</td>
                  </tr>
                <?php
                  $no++;
                endforeach;
                ?>
                <tr>
                  <th colspan="2">Penjualan Produk/Hari</th>
                  <?php for ($i = 0; $i < 6; $i++) { ?>
                    <th><?php echo $total_hari[$i]; ?></th>
                  <?php } ?>
                  <th><?php echo $total_semua; ?></th>
                </tr>
              </tbody>
            </table>

            <h4 class="mt-5">Pembagian Jumlah Roti Setiap Sales</h4>
            <table class="table">
              <thead>
                <tr>
                  <th>Sales</th>
                  <th>Pembagian Roti Hari Selanjutnya</th>
                  <th>Tanggal</th>
                  <th>Plat Nomor</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($kumpul_datanya as $kd) {
                ?>
                  <tr>
                    <td><?php echo $kd['sales']['nama_sales']; ?></td>
                    <td><?php echo round($total_semua * ($total_persen[$no] / 100), 0); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($tanggal . ' +1 day')); ?></td>
                    <td><?php echo $kd['sales']['plat']; ?></td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>



        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    let data = document.querySelector('#total0');
    console.log(data);
  </script>

  <?php include_once('_partials/bawah.php'); ?>