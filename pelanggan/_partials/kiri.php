<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=$url?>pelanggan/index.php" class="brand-link">
    <img src="<?=$url?>img/Logo.png" alt="CVQlau Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">CV Qlau Maju Berkah</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=$url?>pelanggan/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?=$url?>pelanggan/profil.php" class="d-block">Pelanggan Perusahaan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="<?=$url?>pelanggan/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">HALAMAN</li>
          
          <li class="nav-item">
            <a href="<?=$url?>pelanggan/pemesanan.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>pelanggan/penjualan.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Penjualan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
