<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die;
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
// echo "</pre>";
// die;
$id_pembeli = $_POST['id_pembeli'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kurir = $_POST['kurir'];
$ongkir = $_POST['ongkir2'];
$provinsi = $_POST['provinsi2'];
$kota = $_POST['kabupaten2'];
$telepon = $_POST['telepon'];
$total = $_POST['total']+$_POST['ongkir2'];


// $id_dimsum = array_keys($_SESSION['cart']);
// unset($_SESSION['cart']);
// die;

// echo "<pre>";
// var_dump(date("Y-m-d"));
// echo "</pre>";
// die;
?>
<!-- Bayar -->
<section class="pembayaran pembayaran-booking py-5" style="margin-top:50px;">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header bg-warning">
            <h3 class="text-center font-weight-bold" style="color: white">Detail Pesanan</h3>
          </div>
          <div class="card-body p-2">
            <div class="row">
            <?php if ($_SESSION['cart']) {  ?>
                <?php foreach ($_SESSION['cart'] as $id_dimsum => $items) {
                  $dimsum = query("SELECT * FROM dimsum WHERE id_dimsum='$id_dimsum'")[0]; ?>
                  <div class="col text-center">
                    <img src="img/produk/<?= $dimsum['gambar']; ?>" class="card-img bg-light" style="max-width:30%;">
                    <div class="card-body p-1">
                      <h6 class="card-title"><?= $dimsum['nama_dimsum']; ?> <br> <span style="font-family: 'heebo'; font-size: 14px">IDR <?= number_format($dimsum['harga'], 0, 0, '.'); ?></span> <span style="color: #FFB016;">x<?= $items; ?></span></h6>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
            <div class="row">
              <div class="col">
                <ul class="list-group list-group-flush p-0">
                  <li class="list-group-item bg-transparent">Nama      : <?= $nama; ?></li>
                  <li class="list-group-item bg-transparent">Email     : <?= $email; ?></li>
                  <li class="list-group-item bg-transparent">Telepon   : <?= $telepon; ?></li>
                  <li class="list-group-item bg-transparent">Alamat    : <?= $alamat; ?></li>
                  <li class="list-group-item bg-transparent">Provinsi  : <?= $provinsi; ?></li>
                  <li class="list-group-item bg-transparent">KotaKota / Kabupaten : <?= $kota; ?></li>
                  <li class="list-group-item bg-transparent">Kurir     : <?= $kurir; ?></li>
                  <li class="list-group-item bg-transparent">Ongkir    : <?= $ongkir; ?></li>
                  <li class="list-group-item bg-transparent">Total     : Rp <?= number_format($total, 0, 0, '.'); ?></li>
                </ul>
              </div>

            </div>
            <form method="post" action="pages/keranjang/proses.php">
              <input type="hidden" name="id_pembeli" value="<?= $id_pembeli; ?>">
              <input type="hidden" name="nama" value="<?= $nama; ?>">
              <input type="hidden" name="email" value="<?= $email; ?>">
              <input type="hidden" name="alamat" value="<?= $alamat; ?>">
              <input type="hidden" name="kurir" value="<?= $kurir; ?>">
              <input type="hidden" name="ongkir" value="<?= $ongkir; ?>">
              <input type="hidden" name="provinsi" value="<?= $provinsi; ?>">
              <input type="hidden" name="kota" value="<?= $kota; ?>">
              <input type="hidden" name="telepon" value="<?= $telepon; ?>">
              <input type="hidden" name="total" value="<?= $total; ?>">
              <input type="hidden" name="tanggal_transaksi" value="<?= date("Y-m-d"); ?>">
              <button class="btn btn-outline-success btn-block btn-bayar" id="pay-button-booking">Buat pesanan</button>
            </form>
          </div>
        </div>
        
      </div>
      <div class="row mt-5 ml-3">
        <h5 class="card-title" style="font-weight: 600;">Informasi Pembayaran</h5>
        <table class="table">
          <thead>
              <tr> 
              <th scope="col">Pembayaran</th>
              <th scope="col">Nomor Rekening</th>
              <th scope="col">Atas Nama</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">BRI</th>
                <td>7955-0100-5134-539</td>
                <td>Nurul Auliya</td>
              </tr>
              <tr>
                <th scope="row">OVO</th>
                <td>089515664807</td>
                <td>Nurul Auliya</td>
              </tr>
              <tr>
                <th scope="row">DANA</th>
                <td>089515664807</td>
                <td>Nurul Auliya</td>
              </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>