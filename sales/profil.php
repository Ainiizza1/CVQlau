<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_profil.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$profil = profil_sales();
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
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
                Halaman Kebutuhan Profil
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img src="../img/<?php echo $profil['foto']?>" width="150px" height="150px"></td>
                    </div>
                    <h3 class="profile-username text-center"><?= $profil['nama_sales']; ?></h3>
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Username</b> <a class="float-right"><?=$profil['username'];?></a><br>
                        <b>Level</b> <a class="float-right">Sales</a><br>
                      </li>
                    </ul>
                    <a href="profil_ubah.php?id=<?= $profil['id']; ?>" class="btn btn-primary btn-block"><b>Ubah Data</b></a>
                    <a href="profil_ubahpassword.php?id=<?= $profil['id']; ?>" class="btn btn-primary btn-block"><b>Ubah Password</b></a>
                  </div>
                  <!-- /.card-body -->
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