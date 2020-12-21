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
            <h1 class="m-0 text-dark">Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                  Halaman Sales
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Sales</th>
                      <th>No Kendaraan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $nomor=1; ?>
                   <?php $ambil = $conn->query("SELECT * FROM t_sales JOIN t_kendaraan ON t_sales.id_kendaraan = t_kendaraan.id_kendaraan"); ?>
                   <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                     <td><?php echo $nomor; ?></td>
                     <td><?php echo $pecah['nik']; ?></td>
                     <td><?php echo $pecah['nama_sales']; ?></td>
                     <td><?php echo $pecah['plat']; ?></td>
                     <td>
                      <a href="sales_detail.php?id=<?= $pecah['id_sales']; ?>" class="btn-primary btn">Detail</a>
                    </td>
                  </tr>
                  <?php $nomor++ ?>
                <?php } ?>
              </tbody>
              <tfoot>
               <tr>
                 <th>No</th>
                 <th>NIK</th>
                 <th>Nama Sales</th>
                 <th>No Kendaraan</th>
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
