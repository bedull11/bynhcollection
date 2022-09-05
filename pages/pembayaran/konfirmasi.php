<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
$pembayaran = query("SELECT * FROM pembayaran as a, transaksi as b
                WHERE a.id_transaksi=b.id_transaksi and b.id_pembeli='$_SESSION[id_pembeli]'
                ORDER BY a.id_bayar DESC");

// echo "<pre>";
// var_dump($pembayaran);
// echo "</pre>";
// die;
?>
<!--Features-->
<section class="features mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h3 class="mb-3" style="font-weight: 600;">Konfirmasi Pembayaran</h3>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($pembayaran as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['tanggal_bayar']; ?></td>
                        <td>Rp <?= number_format($row['total'], 0, 0, '.'); ?></td>
                        <td><?= $row['status_bayar']; ?></td>
                        <td>
                        <?php if ($row['status_bayar']=='Pembayaran Diterima'): ?>
                        <span class="badge badge-pill badge-success p-2">Success</span>
                        <?php elseif ($row['status_bayar']=='Menunggu Pembayaran'): ?>
                        <a href="main.php?page=form_konfirmasi&form=add&bayar=<?= $row['id_bayar']; ?>&transaksi=<?= $row['id_transaksi']; ?>" class="btn btn-primary">Konfirmasi</a>
                        <?php elseif($row['status_bayar']=='Pembayaran Ditolak'): ?>
                        <a href="main.php?page=form_konfirmasi&form=add&bayar=<?= $row['id_bayar']; ?>&transaksi=<?= $row['id_transaksi']; ?>" class="btn btn-warning text-white">Konfirmasi ulang</a>
                        <?php else: ?>
                        <?php endif; ?>
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