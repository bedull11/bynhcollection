<!-- Bayar -->
<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
?>
<section class="pembayaran my-5">

<?php 
$id_transaksi = $_GET['id_transaksi'];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi ='$id_transaksi'")[0];
$detail_transaksi = query("SELECT * FROM penjualan as a, transaksi as b, dimsum as c WHERE a.id_transaksi = b.id_transaksi and a.id_dimsum = c.id_dimsum and a.id_transaksi='$id_transaksi'");

// echo "<pre>";
// var_dump($transaksi);
// var_dump($detail_transaksi);
// echo "</pre>";
// die;


?>
  <div class="container">
    <div class="row text-center">
      <div class="col mt-5 mb-3">
        <h3 style="font-weight: 600;">Pesanan Anda</h3>
      </div>
    </div>
    
    <div class="row d-flex justify-content-center">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header bg-warning">
            <h3 class="text-center font-weight-bold" style="color: white">Detail Pesanan</h3>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
            <?php if ($detail_transaksi) : ?>
                <?php foreach ($detail_transaksi as $b) : ?>
                  <div class="card bg-transparent text-center" style="width: 8rem;">
                    <img src="img/produk/<?= $b['gambar']; ?>" class="card-img bg-light mx-auto" >
                    <div class="card-body p-1">
                      <h6 class="card-title"><?= $b['nama_dimsum']; ?> <br> <span style="font-size: 14px">Rp <?= number_format($b['harga'], 0, 0, '.'); ?></span> <span style="color: #BA9031;">x<?= $b['jumlah']; ?></span></h6>
                    </div>
                  </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
            <div class="row">
            <?php if ($transaksi) :  ?>

            <?php endif; ?>
              <div class="col">
                <ul class="list-group list-group-flush p-0">
                  <li class="list-group-item bg-transparent">ID Transaksi : <?= $transaksi['id_transaksi']; ?></li>
                  <li class="list-group-item bg-transparent">Nama : <?= $transaksi['nama']; ?></li>
                  <li class="list-group-item bg-transparent">email : <?= $transaksi['email']; ?></li>
                  <li class="list-group-item bg-transparent">Alamat : <?= $transaksi['alamat']; ?></li>
                  <li class="list-group-item bg-transparent">Kota / Kabupaten : <?= $transaksi['kota']; ?></li>
                  <li class="list-group-item bg-transparent">Telepon : <?= $transaksi['telepon']; ?></li>
                  <li class="list-group-item bg-transparent">Total : <?= number_format($transaksi['total'], 0, 0, '.'); ?></li>
                  <li class="list-group-item bg-transparent">Status :
                  <?php if ($transaksi['status'] == 'Pembayaran Diterima') { ?>
                    <span class="badge badge-pill badge-success">Success</span>
                  <?php } elseif ($transaksi['status'] == 'Menunggu Pembayaran' || $transaksi['status'] == 'Menunggu Verifikasi Pembayaran') { ?>
                    <span class="badge badge-pill badge-secondary">Pending</span>
                  <?php } else { ?>
                    <span class="badge badge-pill badge-danger">Cancel</span>
                  <?php }; ?>
                  </li>
                  <li class="list-group-item bg-transparent">Tanggal Transaksi : <?= date_format(date_create($transaksi['tanggal_transaksi']), 'd/m/Y'); ?></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
        <div class="container">
          <div class="row mt-5">
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
    </div>
  </div>
</section>