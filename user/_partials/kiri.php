<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=$url?>user/index.php" class="brand-link">
    <img src="<?=$url?>user/assets/dist/img/Logo.png" alt="CVQlau Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">CV Qlau Maju Berkah</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=$url?>user/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?=$url?>user/profil.php" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="<?=$url?>user/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">HALAMAN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$url?>user/produk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$url?>user/jenisproduk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$url?>user/produkawal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Awal Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/pengguna.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/sales.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Sales
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/pelanggan.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/pengiriman.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Pengiriman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/pemesanan.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=$url?>user/distribusi.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Kebutuhan Distribusi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
