<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Praktikum <sup>4</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo (!isset($_GET['page']) || $_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Barang -->
    <li class="nav-item <?php echo (isset($_GET['page']) && strpos($_GET['page'], 'barang') !== false) ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=barang">
            <i class="fas fa-fw fa-box"></i>
            <span>Barang</span>
        </a>
    </li>

    <!-- Nav Item - Kategori (nanti dikembangkan) -->
    <li class="nav-item <?php echo (isset($_GET['page']) && strpos($_GET['page'], 'kategori') !== false) ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=kategori">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
