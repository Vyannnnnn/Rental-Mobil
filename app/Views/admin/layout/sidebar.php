<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard') ?>">Unggul Rent</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?= base_url('dashboard') ?>">UR</a>
    </div>

    <!-- Sidebar -->
    <ul class="sidebar-menu">
      <li class="menu-header">User Management</li>
      <li><a class="nav-link" href="<?= base_url('data-pengguna') ?>"><i class="fas fa-users"></i> <span>Data Pengguna</span></a></li>

      <li class="menu-header">Rental Management</li>
      <li><a class="nav-link" href="<?= base_url('data-armada') ?>"><i class="fas fa-car"></i> <span>Data Armada</span></a></li>
      <li><a class="nav-link" href="<?= base_url('driver') ?>"><i class="fas fa-user-cog"></i> <span>Biaya Driver</span></a></li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Transaksi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('data-transaksi') ?>">Data Transaksi</a></li>
          <li><a class="nav-link" href="<?= base_url('proses-transaksi') ?>">Diproses</a></li>
          <li><a class="nav-link" href="<?= base_url('rent-transaksi') ?>">Disewa</a></li>
          <li><a class="nav-link" href="<?= base_url('success-transaksi') ?>">Selesai</a></li>
          <li><a class="nav-link" href="<?= base_url('cancelled-transaksi') ?>">Dibatalkan</a></li>
        </ul>
      </li>
      <li><a class="nav-link" href="<?= base_url('pembayaran') ?>"><i class="fas fa-credit-card  "></i> <span>Rekening</span></a></li>
      <li><a class="nav-link" href="<?= base_url('laporan') ?>"><i class="fas fa-file-invoice"></i> <span>Laporan</span></a></li>
    </ul>
    <!-- End Sidebar -->
  </aside>
</div>