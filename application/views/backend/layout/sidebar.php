<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url()?>">
    <img src="<?= base_url()?>assets/img/samsat.png" alt="" width="60%">
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->

  <?php if($judul != "Dashboard"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url()?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Modul
  </div>

  <?php if($judul != "Data Antrian"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/antrian')?>">
      <i class="fas fa-fw fa-list"></i>
      <span>Antrian</span></a>
  </li>

  <?php if($judul != "Data Pajak Kendaraan"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/pajak')?>">
      <i class="fas fa-fw fa-database"></i>
      <span>Pajak Kendaraan</span></a>
  </li>

  <?php if($judul != "Data Costumer"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/costumer')?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Costumer</span></a>
  </li>

  <?php if($judul != "Data Informasi Pelayanan"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/informasi')?>">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Informasi Pelayanan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Heading -->
  <div class="sidebar-heading">
    Setting
  </div>

  <!-- Nav Item - Charts -->
  <?php if($judul != "Profile"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/profile')?>">
      <i class="fas fa-fw fa-user-cog"></i>
      <span>Profile</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <?php if($judul != "Data Akun Admin"):?>
  <li class="nav-item">
    <?php else:?>
  <li class="nav-item active">
    <?php endif;?>
    <a class="nav-link" href="<?= base_url('backend/admin')?>">
      <i class="fas fa-fw fa-user-plus"></i>
      <span>Users</span></a>
  </li>

</ul>
<!-- End of Sidebar -->