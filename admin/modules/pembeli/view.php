<?php
$users = query("select * from pembeli order by id_pembeli");

// echo "<pre>";
// var_dump($users);
// echo "</pre>";
// die;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Pelanggan</h1>
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
    // tampilkan pesan Sukses "Data Pembeli baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success' role='alert'>
                Penlanggan berhasil diubah
                  </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success' role='alert'>
      Penlanggan berhasil dihapus
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
            <th>ID Pembeli</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th width="130px"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($users as $m) { ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $m['id_pembeli']; ?></td>
              <td><?= $m['nama']; ?></td>
              <td><?= $m['email']; ?></td>
              <td><?= $m['telepon']; ?></td>
              <td><?= $m['alamat']; ?></td>
              <td>
                <a class="btn btn-warning" href="?module=form_pembeli&form=edit&id_pembeli=<?= $m['id_pembeli']; ?>">Edit</a>
                <a class="btn btn-danger btn-hapusPembeli" href="#" data-toggle="modal" data-id="<?= $m['id_pembeli']; ?>"  data-nama="<?= $m['nama']; ?>">Hapus</a>
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
<form action="modules/pembeli/proses.php" method="GET" class="d-inline">
  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembeli?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" class="form-control" name="act" value="delete">
                <input type="hidden" class="form-control id_pembeli" name="id_pembeli">
                <h5 class="ket-hapus"></h5>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Hapus Data</button>
              </div>
          </div>
      </div>
  </div>
</form>