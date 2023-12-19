<!--sidebar start-->
<?php 
    $id = $_SESSION['admin']['id_member'];
    $hasil_profil = $lihat -> member_edit($id);
?>
<!-- Sidebar -->

<ul class="navbar-nav sidebar accordion" id="accordionSidebar" style="background-color: #1A438F">

    <!-- Sidebar - Brand -->
    </br><br><br>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="tm-site-header">
        <img height="70" width="80" class="img-profile rounded-circle" src="assets/img/user/<?php echo $hasil_profil['gambar'];?>">
        <br><br>
        <div class="mb-3 mx-auto text-white tm-site-logo"><?php echo $hasil_profil['nm_member'];?><sup></sup></div></div>
    </a>
</br><br>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-1 bg-white">

    <!-- Nav Item - Dashboard -->
    
    <li class="nav-item active">
        <a class="nav-link " href="index.php">
            <i class="text-white fas fa-fw fa-tachometer-alt "></i>
            <span class="text-white">Dashboard</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider bg-white">
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
           Master
       </div> -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="text-white fas fa-fw fa-database"></i>
            <span class="text-white">Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse text-white" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="index.php?page=barang">Barang</a>
                <a class="collapse-item" href="index.php?page=kategori">Kategori</a>
                <!-- <a class="collapse-item" href="index.php?page=user">User</a> -->
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
            aria-controls="collapse3">
            <i class="text-white fas fa-fw fa-desktop"></i>
            <span class="text-white">Transaksi</span>
        </a>
        <div id="collapse3" class="collapse " aria-labelledby="heading3" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="index.php?page=jual">Transaksi Jual</a>
                <a class="collapse-item" href="index.php?page=laporan">Laporan Penjualan</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block bg-white">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 bg-white" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand topbar topbar-dark topbar mb-4 static-top shadow " style="background-color: #1A438F">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h5 class="text-white text-judul"><b>CV Rajawali Digital Printing</b></h5>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
                <!-- Topbar Search -->
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow" >
                    <a class="nav-link dropdown-toggle"  href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle"
                            src="assets/img/user/<?php echo $hasil_profil['gambar'];?>">
                        <span
                            class="mr-2 d-none d-lg-inline text-white small ml-2"><?php echo $hasil_profil['nm_member'];?></span>
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php?page=user">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            