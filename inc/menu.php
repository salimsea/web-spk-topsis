<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar"
  >
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?=$baseurl;?>/admin"
    >
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">TOPSIS <sup>DSS</sup></div>
    </a>

    <hr class="sidebar-divider my-0" />

    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a
      >
    </li>

    <hr class="sidebar-divider" />


    <?php if($_SESSION['level'] == 'admin') { ?>

    <div class="sidebar-heading">MASTER DATA</div>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/produk.php">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Produk</span></a
      >
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/kriteria.php">
        <i class="fas fa-fw fa-tag"></i>
        <span>Data Kriteria</span></a
      >
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/bobot.php">
        <i class="fas fa-fw fa-book"></i>
        <span>Data Pembobotan</span></a
      >
    </li>
    
    
    <hr class="sidebar-divider" />
    
    <div class="sidebar-heading">KLASIFIKASI DATA</div>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/himpunan.php">
        <i class="fas fa-fw fa-pen"></i>
        <span>Data Himpunan Kriteria</span></a
      >
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/klasifikasi.php">
        <i class="fas fa-fw fa-paper-plane"></i>
        <span>Proses Klasifikasi</span></a
      >
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/analisa.php">
        <i class="fas fa-fw fa-rocket"></i>
        <span>Analisa TOPSIS</span></a
      >
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/analisa_hasil.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Hasil Analisa TOPSIS</span></a
      >
    </li>
    
    <hr class="sidebar-divider d-none d-md-block" />
    
    <div class="sidebar-heading">INTEGRASI</div>
    
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/api_docs.php">
        <i class="fas fa-fw fa-fire"></i>
        <span>API Dokumentasi</span></a
      >
    </li>

    <?php } else if($_SESSION['level'] == 'penjual') { ?>
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/analisa.php">
        <i class="fas fa-fw fa-rocket"></i>
        <span>Analisa TOPSIS</span></a
      >
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=$baseurl;?>/admin/analisa_hasil.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Hasil Analisa TOPSIS</span></a
      >
    </li>
    <?php } ?>

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>