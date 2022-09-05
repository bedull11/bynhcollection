<?php 
$produk = query("SELECT * FROM dimsum");

?>
<!--Carousel-->
<section class="carousel mt-5">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" data-aos="zoom-in">
            <div
              id="storeCarousel"
              class="carousel slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li
                  data-target="#storeCarousel"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li data-target="#storeCarousel" data-slide-to="1"></li>
                <li data-target="#storeCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="img/banner.jpg"
                    class="d-block w-100"
                    alt="Carousel Image"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="img/banner2.png"
                    class="d-block w-100"
                    alt="Carousel Image"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="img/banner3.png"
                    class="d-block w-100"
                    alt="Carousel Image"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--AkhirCarousel-->

<!--Features-->
<section class="features pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md mb-2">
        <h2 style="font-size: 30px; font-weight: bold;">Produk</h2>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php
        // fungsi untuk menampilkan pesan
        // jika alert = "" (kosong)
        // tampilkan pesan "" (kosong)
        if (empty($_GET['alert'])) {
          echo "";
        }
        // jika alert = 1
        // tampilkan pesan Sukses "Data transaksi baru berhasil disimpan"
        elseif ($_GET['alert'] == 1) {
                echo "<div class='alert alert-success' role='alert'>
                Pesanan berhasil disimpan di keranjang
              </div>";
        }
      ?>
      </div>
    </div>

    <div class="row">
      <?php foreach ($produk as $row) { ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
            <figure class="figure">
              <div class="figure-img">
                <img src="img/produk/<?= $row['gambar']; ?>" class="figure-img img-fluid rounded">
                <a href="?page=detail&id_dimsum=<?=  $row['id_dimsum']; ?>" class="d-flex justify-content-center">
                </a>
              </div>
              <figcaption class="figure-caption">
                <h3><a href="?page=detail&id_dimsum=<?=  $row['id_dimsum']; ?>"><?= $row['nama_dimsum']; ?></a></h3>
                <span>Rp <?= number_format($row['harga'], 0, 0, '.'); ?></span>
              </figcaption>
            </figure>
        </div>
      <?php } ?>
      </div>      
    </div>
  </div>
</section>
<!--AkhirFeatures-->  

<!-- services -->
<section class="shop-services section home">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single-service">
          <img src="img/services/securepayment.svg" alt="">
          <h4>Pembayaran Aman</h4>
          <p>100% pembayaran aman</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-service">
          <img src="img/services/bestpeice.svg" alt="" >
          <h4>Harga Terbaik</h4>
          <p>Tidak menguras dompet</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single-service">
          <img src="img/services/award-solid.svg" alt="">
          <h4>Produk Terbaik</h4>
          <p>Nyamaan saat dipakai</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Akhirservices -->