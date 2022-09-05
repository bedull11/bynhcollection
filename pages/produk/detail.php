<?php
$id_dimsum = $_GET['id_dimsum'];
$produk = query("SELECT * FROM dimsum WHERE id_dimsum = $id_dimsum")[0];
$similar = query("SELECT * FROM dimsum WHERE id_dimsum <> $id_dimsum");

// echo "<pre>";
// var_dump($similar);
// echo "</pre>";
// die;
?>
<!-- Breadcrumbs -->
<section class="store-breadcrumbs">
  <div class="container mt-5 mt-n4">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent pl-0">
            <li class="breadcrumb-item"><a href="main.php?page=produk" style="text-decoration: none">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Details Produk
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- Single Product -->
<section class="single-product">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <figure class="figure">
          <img src="img/produk/<?= $produk['gambar']; ?>" class="figure-img img-fluid" style="width: 460px; height: 246px">
          <figcaption class="figure-caption">
          </figcaption>
        </figure>
      </div>

      <div class="col-lg-6">
        <h3><?= $produk['nama_dimsum']; ?></h3>
        <p class="text-muted mb-4">Stock : <?= $produk['stok']; ?></p>
        <p class="text-success pb-5">Rp <?= number_format($produk['harga'], 0, 0, '.');; ?></p>
        <div class="btn-product">
          <a href="cart.php?act=add&id_dimsum=<?= $produk['id_dimsum']; ?>" class="btn btn-success text-white">Add to Cart</a>
        </div>
      </div>
    </div>
</section>


<!-- Product Description -->
<section class="store-deksripsi mb-5" data-aos="zoom-in">
  <div class="container">
    <div class="row mt-3">
      <div class="col-12 col-lg-8">
        <h4 style="font-weight: 600;">Deskirpsi Produk</h4>
        <p class="text-muted"><?= $produk['deskripsi']; ?></p>
      </div>
    </div>
  </div>
</section>
<!-- Akhir Product Description -->

<!-- Similar Product -->
<section class="similar-product">
  <div class="container">
    <div class="row mb-2">
      <div class="col">
        <h3>Produk Lainnya</h3>
        <p class="text-muted">Pelengkap produk di atas</p>
      </div>
    </div>

    <div class="row">
      <?php foreach ($similar as $row) { ?>
        <div class="col-sm-4">
          <figure class="figure mt-3">
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
</section>
<!-- Akhir Similar Product -->