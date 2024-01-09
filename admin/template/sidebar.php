<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Kasir Rajawali</a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-user-tie"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?page=user">Profiles</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Barang
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?page=barang">Stok Barang</a>
                            <a class="nav-link" href="?page=kategori">Kategori Barang</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Transaction</div>
                    <a class="nav-link collapsed" href="?page=transaksi" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-handshake"></i></div>
                        Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="?page=jual">Transaksi Jual</a>
                            <a class="nav-link" href="?page=Laporan">Laporan Penjualan</a>
                        </nav>
                    </div>
                    <div style="position:absolute; left: 0; bottom: 0;">
                        <div class="sb-sidenav-menu-nested nav" style="bottom: 0; margin: 0;    ">
                            <div style="display: flex;"> 
                                <a class="nav-link" href="logout.php"><i class="fa-solid fa-person-running" style="margin-right: 5px;"></i> | Logout</a>
                            </div>
                        </div> 
                    </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">