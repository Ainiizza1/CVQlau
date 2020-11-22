<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('../function.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Pengguna</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengguna</li>
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
								Halaman Pengguna	
							</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="card-body">
								<a class="btn btn-primary" href="tambahpengguna.php">Tambah Data</a><br><br>
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Username</th>
											<th>Level User</th>
											<th>Foto</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $nomor=1; ?>
										<?php $ambil = $conn->query("SELECT * FROM t_users"); ?>
										<?php while ($pecah = $ambil->fetch_assoc()) {
											$badge = ($pecah['status']=="1")? 'badge-success':'badge-danger' ;
											?>
											<tr>
												<td><?php echo $nomor; ?></td>
												<td><?php echo $pecah['nama']; ?></td>
												<td><?php echo $pecah['username']; ?></td>
												<td><?php echo $pecah['level']; ?></td>
												<td><img src="<?=$url?>img/<?php echo $pecah['foto']; ?>" width="100" height="100"></td>
												<td class="project-state"><span class="badge <?=$badge?>"><?php echo ($pecah['status']=="1")?"Aktif":"Tidak Aktif"; ?></span></td>
												<td>
													<a href="hapuspengguna.php?id=<?= $pecah['id']; ?>" class="btn-danger btn">Hapus</a>
													<a href="ubahpengguna.php?id=<?= $pecah['id']; ?>" class="btn btn-warning">Ubah</a>
												</td>
											</tr>
											<?php $nomor++ ?>
										<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Username</th>
											<th>Level User</th>
											<th>Foto</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</tfoot>
								</table>
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