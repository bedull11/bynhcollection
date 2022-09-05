<?php
$pembayaran = query("select * from pembayaran where status_bayar='Menunggu Verifikasi Pembayaran' order by tanggal_bayar desc");

// echo "<pre>";
// var_dump($pembayaran);
// echo "</pre>";
// die;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Pembayaran</h1>
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
                    Pembayaran berhasil diterima
                  </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success' role='alert'>
                  Pembayaran berhasil ditolak
                  </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success' role='alert'>
                    Admin berhasil dihapus
                  </div>";
    }
    ?>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>ID Transaksi</th>
            <th>Nama</th>
            <th>jumlah</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th width="60px"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($pembayaran as $m) { ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $m['id_transaksi']; ?></td>
              <td><?= $m['nama']; ?></td>
              <td><?= number_format($m['jumlah_bayar'], 0, 0, '.'); ?></td>
              <td>
                <img src="../img/pembayaran/<?= $m['bukti_bayar']; ?>" class="figure-img img-fluid" style="width: 200px">
              </td>
              <td><?= $m['status_bayar']; ?></td>
              <td><?= $m['tanggal_bayar']; ?></td>
              <td>
                <a href="#" class="btn btn-warning btn-detail" data-toggle="modal" data-idb="<?= $m['id_bayar']; ?>" data-id="<?= $m['id_transaksi']; ?>" data-nama="<?= $m['nama']; ?>" data-telepon="<?= $m['no_telepon']; ?>" data-jumlah="<?= $m['jumlah_bayar']; ?>" data-bukti="<?= $m['bukti_bayar']; ?>" data-status="<?= $m['status_bayar']; ?>" data-tanggal="<?= $m['tanggal_bayar']; ?>"><i class="fas fa-info-circle"></i> Info</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Detail -->
  <div class="modal" id="modalDetail">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid p-0">
            <div class="col" style="color: black;">
              <ul class="list-group list-group-flush p-0 mb-2">
                <li class="list-group-item bg-transparent">ID Transaksi : <span class="id_transaksi"></span></li>
                <li class="list-group-item bg-transparent">Nama : <span class="nama"></span></li>
                <li class="list-group-item bg-transparent">Telepon : <span class="telepon"></span></li>
                <li class="list-group-item bg-transparent">Jumlah : <span class="jumlah_bayar"></span></li>
                <li class="list-group-item bg-transparent">Status : <span class="status_bayar"></span></li>
                <li class="list-group-item bg-transparent">Tanggal Transaksi : <span class="tanggal_bayar"></span></li>
              </ul>
              <img src="../img/pembayaran/60cafff6ae0d6.png" class="figure-img img-fluid img-bukti ml-3" style="width: 200px">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="" type="submit" class="btn btn-danger btn-tolak">Tolak</a>
          <a href="" type="submit" class="btn btn-success btn-terima">Terima</a>
        </div>
      </div>
    </div>
  </div>


<!-- Akhir modal tambah -->