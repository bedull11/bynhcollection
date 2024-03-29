<?php
session_start();
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
// die;
// require_once "config/database.php";
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password']) && empty($_SESSION['id_admin'])) :
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
else :
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ByNH Collection</title>
    <link rel="shortcut icon" href="assets/img/logo.jpg" />
    
    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!--Font Awesome-->
    <!-- <link rel="stylesheet" href="assets/css/all.css"> -->
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/datepicker.min.css">
    <!-- <link rel="stylesheet" href="assets/css/theme-default.min.css">
    <style>
    input[type="text"]
    {
        font-size:18px;
        width: 100%;
    }
    </style> -->

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    
    <!-- <script src="assets/js/jquery.form-validator.min.js"></script> -->

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?module=beranda">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Page</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($_GET['module'])=='beranda'?'active': ''; ?>">
                <a class="nav-link" href="?module=beranda">
                    <i class="fas fa-fw fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item <?= ($_GET['module'])=='produk'?'active': ''; ?>">
                <a class="nav-link" href="?module=produk">
                    <i class="fas fa-box-open mr-3"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item <?= ($_GET['module'])=='admin'?'active': ''; ?>">
                <a class="nav-link" href="?module=admin">
                <i class="fas fa-user mr-3 ml-1"></i>
                    <span>Admin</span></a>
            </li>

            <li class="nav-item <?= ($_GET['module'])=='pembayaran'?'active': ''; ?>">
                <a class="nav-link" href="?module=pembayaran">
                    <i class="fas fa-comment-dollar mr-3"></i>
                    <span>Pembayaran</span></a>
            </li>

            <li class="nav-item <?= ($_GET['module'])=='transaksi'?'active': ''; ?>">
                <a class="nav-link" href="?module=transaksi">
                    <i class="fas fa-dolly mr-3"></i>
                    <span>Transaksi</span></a>
            </li>

            <li class="nav-item <?= ($_GET['module'])=='pembeli'?'active': ''; ?>">
                <a class="nav-link" href="?module=pembeli">
                    <i class="fas fa-users-cog mr-3"></i>
                    <span>Pelanggan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: white;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : ''; ?></span>
                                <img class="img-profile rounded-circle" src="../img/admin/<?= isset($_SESSION['foto']) ? $_SESSION['foto'] : 'default.png'; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <?php include "content.php"; ?>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; By.NHCollection <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" Jika sudah yakin untuk keluar dari Admin.</div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/all.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/datatables-demo.js"></script>
    <script src="assets/js/jquery.maskMoney.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/datePicker.js"></script>
    <script src="assets/js/fungsiAdmin.js"></script>
</body>

</html>
<?php endif; ?>
