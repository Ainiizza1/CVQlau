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
  					<h1 class="m-0 text-dark">Jenis Produk</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="produk.php">Home</a></li>
  						<li class="breadcrumb-item active">Jenis Produk</li>
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
  								Halaman Jenis Produk
  							</h3>
  						</div><!-- /.card-header -->

  						<div class="card-body">
  							<div class="card-body">
  								<div class="card card-primary">
  									<div class="card-header">
  										<h3 class="card-title">TAMBAH PRODUK</h3>
  									</div>
  									<!-- /.card-header -->
  									
  									<!-- form start -->
  									<form>
  										<?php $ambil = $conn->query("SELECT * FROM t_jproduk"); ?>
  										<?php while ($pecah = $ambil->fetch_assoc()) { ?>

  											<div class="card-body">
  												<div class="form-group">
  													<label>KODE PRODUK</label>
  													<input name="kodeproduk" type="text" class="form-control" placeholder="Kode Produk">
  												</div>
  												<div class="form-group">
  													<label>NAMA PRODUK</label>
  													<input name="namaproduk" type="text" class="form-control" placeholder="Nama Produk">
  												</div>
  												<div class="form-group">
  													<label>HARGA PRODUK</label>
  													<input name="hargaproduk" type="text" class="form-control" placeholder="Harga Produk">
  												</div>  
  											</div>
  											<!-- /.card-body -->

  											<div class="card-footer">
  												<button type="submit" class="btn btn-primary">Submit</button>
  											</div>
  										<?php } ?>
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

