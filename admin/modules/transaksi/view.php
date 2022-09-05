<?php
$transaksi = query("select * from transaksi order by tanggal_transaksi desc");

// echo "<pre>";
// var_dump($transaksi);
// echo "</pre>";
// die;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Transaksi</h1>
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
                Transaksi berhasil diubah
                  </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success' role='alert'>
                    Transaksi berhasil dihapus
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
            <th>ID Pembeli</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th width="130px"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($transaksi as $m) { ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $m['id_transaksi']; ?></td>
              <td><?= $m['id_pembeli']; ?></td>
              <td><?= $m['nama']; ?></td>
              <td><?= $m['alamat']; ?>, <?= $m['kota']; ?></td>
              <td><?= $m['telepon']; ?></td>
              <td><?= number_format($m['total'], 0, 0, '.'); ?></td>
              <td>
              <?php if ($m['status'] == 'Pembayaran Diterima') { ?>
                <span class="badge badge-pill badge-success">Pembayaran Diterima</span>
              <?php } elseif ($m['status'] == 'Menunggu Verifikasi Pembayaran') { ?>
                <span class="badge badge-pill badge-warning">Menunggu Verifikasi Pembayaran</span>
              <?php }  elseif ($m['status'] == 'Menunggu Pembayaran') { ?>
                <span class="badge badge-pill badge-secondary">Menunggu Pembayaran</span>
              <?php } else { ?>
                <span class="badge badge-pill badge-danger">Pembayaran Ditolak</span>
              <?php }; ?>
              </td>
              <td><?= $m['tanggal_transaksi']; ?></td>
              <td>
                <a class="btn btn-warning" href="?module=form_transaksi&form=edit&id_transaksi=<?= $m['id_transaksi']; ?>">Edit</a>
                <a class="btn btn-danger btn-hapusTransaksi" href="#" data-toggle="modal" data-id="<?= $m['id_transaksi']; ?>"  data-nama="<?= $m['nama']; ?>">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Logout Modal-->
<form action="modules/transaksi/proses.php" method="GET" class="d-inline">
  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Transaksi?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" class="form-control" name="act" value="delete">
                <input type="hidden" class="form-control id_transaksi" name="id_transaksi">
                <h5 class="ket-hapus"></h5>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" >Hapus Data</button>
              </div>
          </div>
      </div>
  </div>
</form>