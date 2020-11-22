  <?php 
  session_start();
  include('cek_session.php');
  require_once('../url.php'); 
  require_once('function_produk.php'); 

  include_once('_partials/atas.php');
  include_once('_partials/kiri.php');
  ?>

  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Pelanggan</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active">Pelanggan</li>
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
  								Halaman Pelanggan
  							</h3>
  						</div><!-- /.card-header -->

  						<div class="card-body">
  							<a class="btn btn-primary" href="tambahpelanggan.php">Tambah Data</a><br><br>
  							<table id="example1" class="table table-bordered table-hover">
  								<thead>
  									<tr>
  										<th>No</th>
                      <th>Kode Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>Kota</th>
                      <th>Kecamatan</th>
                      <th>No Hp / Telp</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $nomor=1; ?>
                   <?php $ambil = $conn->query("SELECT * FROM t_pelanggan"); ?>
                   <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                     <td><?php echo $nomor; ?></td>
                     <td><?php echo $pecah['kode_pelanggan']; ?></td>
                     <td><?php echo $pecah['nama_pelanggan']; ?></td>
                     <td><?php echo $pecah['alamat_pelanggan']; ?></td>
                     <td><?php echo $pecah['kota']; ?></td>
                     <td><?php echo $pecah['kecamatan']; ?></td>
                     <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                     <td class="project-state"><span class="badge badge-success"><?php echo ($pecah['status']=="1")?"Aktif":"Tidak Tidak Aktif"; ?></span></td>
                     <td>
                      <a href="hapuspelanggan.php?id=<?= $pecah['id_pelanggan']; ?>" class="btn-danger btn">Hapus</a>
                      <a href="ubahpelanggan.php?id=<?= $pecah['id_pelanggan']; ?>" class="btn btn-warning">Ubah</a>
                    </td>
                  </tr>
                  <?php $nomor++ ?>
                <?php } ?>
              </tbody>
              <tfoot>
               <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Kode Pelanggan</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>No Hp / Telp</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
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

