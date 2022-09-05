<?php
session_start();
// require_once "config/database.php";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>ByNH Collection</title>
  <link rel="shortcut icon" href="img/logo.jpg" />


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <!--Font Awesome-->
  <link rel="stylesheet" href="assets/css/all.css">

  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;600&display=swap" rel="stylesheet">


  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">

  <!--CSS-->
  <link rel="stylesheet" href="assets/css/auth.css">

  <link rel="stylesheet" href="assets/css/datepicker.min.css">

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
      <h2>
        <a
          href="main.php?page=home"
          class="navbar-brand"
          style="color: #f8a488; font-weight: bold"
        >
          By.NH Collection
        </a>
      </h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" style="font-size: 18px;">
          <li class="nav-item  <?= ($_GET['page'])=='home'?'active': ''; ?>">
            <a class="nav-link" href="?page=home">Home</a>
          </li>
          <li class="nav-item <?= ($_GET['page'])=='produk'?'active': ''; ?>">
            <a class="nav-link" href="?page=produk">Produk</a>
          </li>
          <?php if (isset($_SESSION['id_pembeli'])) { ?>
            <li class="nav-item dropdown <?= ($_GET['page'] =='konfirmasi'||$_GET['page'] =='pesanan')?'active': ''; ?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Transaksi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="?page=pesanan"><i class="fas fa-dolly-flatbed mr-2"></i>Pesanan</a>
                <a class="dropdown-item" href="?page=konfirmasi"><i class="fas fa-wallet mr-2"></i>Konfirmasi Pembayaran</a>
              </div>
            </li>
            <li class="nav-item dropdown <?= ($_GET['page'] =='ubah_profile')?'active': ''; ?>">
                <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Hi, <?= isset($_SESSION['nama']) ? $_SESSION['nama']:''; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="?page=ubah_profile"><i class="far fa-user mr-2"></i>Ubah Profile</a>
                <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
              </div>
            </li>
        </ul>
        <a href="?page=keranjang" style="text-decoration: none; font-weight: 600;"  class="text-success"><i class="fas fa-shopping-cart"></i>  
        [ <?= (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : '0'; ?> ]</a>
      <?php } else { ?>
        <li class="nav-item <?= ($_GET['page'])=='login'?'active': ''; ?>">
          <a class="nav-link" href="?page=login">Login</a>
        </li>
        <li class="nav-item <?= ($_GET['page'])=='daftar'?'active': ''; ?>">
          <a class="nav-link" href="?page=daftar">Daftar</a>
        </li>
      <?php } ?>
      </ul>
      </div>
    </div>
  </nav>
  <!--Akhir Navbar-->

  <!-- Page Content -->
  <div style="min-height:700px" class="">
    <!-- panggil file "content.php" untuk menampilkan halaman konten-->
    <?php include "content.php"; ?>

    <?php
        // echo "<pre>";
        // var_dump(count($_SESSION['cart']));
        // echo "</pre>";
        // die; ?>
  </div>
  <!-- /.container -->

  <!--Footer-->
  <footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-about">
            <h3>Tentang Kami</h3>
            <p>
              Toko kami menjual Fashion Muslimah yang berfokus dengan bahan
              berkualitas dan harga terjangkau
            </p>
          </div>

          <div class="col-md-4 offset-md-1 footer-contact">
            <h3>Contact</h3>
            <p><i class="fas fa-phone"></i> Phone: +62 895-1566-4807</p>
            <p>
              <i class="fas fa-envelope"></i> Gmail: nurulauliyapm3@gmail.com
            </p>
            <p>
              <i class="fab fa-instagram"></i> Instagram: @by.nhcollection
            </p>
          </div>

          <div class="col-md-4 footer-links">
            <div class="row">
              <div class="col">
                <h3>Links</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <p><a class="scroll-link" href="#top-content">Home</a></p>
                <p><a href="main.php?page=produk">Produk</a></p>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="inner">
              <div class="copyright">
                <p>
                  Copyright &copy; <?= date('Y'); ?> By.NH Collection. All Rights Reserved.
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </footer>
  <!--AkhirFooter-->

  <!-- jQuery -->
  <!-- <script type="text/javascript" src="assets/js/jquery.js"></script> -->

  <!-- Bootstrap Core JavaScript -->
  <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.maskMoney.min.js"></script> -->

  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/all.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/jquery.maskMoney.min.js"></script>

  <!-- Script to Activate the Carousel -->
  <script>
    $('.carousel').carousel({
      interval: 5000 //changes the speed
    });
  </script>

  <!-- inline scripts related to this page -->
  <script type="text/javascript">
    jQuery(function($) {
      //datepicker plugin
      $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      // toolip
      $('[data-toggle="tooltip"]').tooltip();

      // mask
      $('#jumlah_pembayaran').maskMoney({
        thousands: '.',
        decimal: ',',
        precision: 0
      });
    });
  </script>

  <script>
  function previewImg(input) {
    //  const gambarLabel = input.nextElementSibling;
    const imgPreview = input.parentElement.previousElementSibling.firstElementChild;
    // console.log(gambar);
    //  gambarLabel.textContent = input.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(input.files[0]);


    fileGambar.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
  </script>

  <!-- <script>
    // Department change
    $('#datepicker').change(function() {
      alert('ok');
      });
  </script> -->
</body>

</html>