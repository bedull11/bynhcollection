<?php // fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
} ?>
<!--Features-->
<section class="features mt-5 pt-5">
<?php 
$transaksi = query("SELECT * FROM transaksi WHERE id_pembeli='$_SESSION[id_pembeli]'
                ORDER BY tanggal_transaksi DESC");

// echo "<pre>";
// var_dump($transaksi);
// echo "</pre>";
// die;
?>
    <div class="container">
        <div class="row">
        <div class="col-md">
            <h3 class="mb-3" style="font-weight: 600;">Pesanan Saya</h3>
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
                    Pesanan berhasil dibuat, Silahkan lakukan pembayaran terlebih dahulu dan upload bukti pembayaran di menu konfirmasi pembayaran.
                  </div>";
            }
        ?>
        </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($transaksi as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['tanggal_transaksi']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['alamat'].', '.$row['kota']; ?></td>
                        <td><?= $row['telepon']; ?></td>
                        <td>Rp <?= number_format($row['total'], 0, 0, '.'); ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                        <a href="main.php?page=detail_pesanan&id_transaksi=<?= $row['id_transaksi']; ?>" class="btn btn-warning text-white">Detail</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php }?>
                   
                </tbody>
            </table>
        </div>      
        </div>
    </div>
</section>
    <!--AkhirFeatures-->  