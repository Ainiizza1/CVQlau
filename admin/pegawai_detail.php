<?php 
session_start();
include('cek_session.php');
require_once('../url.php'); 
require_once('function_pegawai.php'); 

include_once('_partials/atas.php');
include_once('_partials/kiri.php');

$id = $_GET['id'];
$detail_pegawai=detail_pegawai($id);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pegawai</li>
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
              <a href="pelanggan.php" class="btn btn-default btn-sm">Kembali</a>
            </div><!-- /.card-header -->

            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Level</th>
                    <th>No Telp</th>
                    <th>Username</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php while ($pecah = $detail_pegawai->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $pecah['nama_lengkap']; ?></td>
                      <td><?php echo $pecah['foto']; ?></td>
                      <td><?php echo $pecah['level']; ?></td>
                      <td><?php echo $pecah['telp']; ?></td>
                      <td><?php echo $pecah['username']; ?></td>
                      <td>
                        <a href="pegawai_hapus.php?id=<?= $pecah['id_pegawai']; ?>" class="btn-danger btn">Hapus</a>
                        <a href="pegawai_ubah.php?id=<?= $pecah['id_pegawai']; ?>" class="btn btn-warning">Ubah</a>
                      </td>
                    </tr>
                    <?php $nomor++ ?>
                  <?php } ?>
                </tbody>
                <tfoot>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Foto</th>
                 <th>Level</th>
                 <th>No Telp</th>
                 <th>Username</th>
                 <th>Aksi</th>
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

