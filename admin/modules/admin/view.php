<?php
$admin = query("select * from admin");

// echo "<pre>";
// var_dump($admin);
// echo "</pre>";
// die;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Admin</h1>
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
                    Admin berhasil disimpan
                  </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success' role='alert'>
                    Admin berhasil diubah
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
        <a class="btn btn-primary mb-3 " href="?module=form_admin&form=add" <button class="btn"><i class="fas fa-plus-square"></i> Tambah Data Admin</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID admin</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th width="140px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($admin as $m) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['id_admin']; ?></td>
                            <td><?= $m['nama_admin']; ?></td>
                            <td>
                                <img src="../img/admin/<?= $m['foto']; ?>" class="figure-img img-fluid rounded-circle" style="width: 200px">
                            </td>
                            <td><?= $m['username']; ?></td>
                            <td><?= $m['password']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="?module=form_admin&form=edit&id_admin=<?= $m['id_admin']; ?>">Edit</a>

                                <a class="btn btn-danger btn-hapusAdmin" href="#" data-toggle="modal" data-id="<?= $m['id_admin']; ?>"  data-nama="<?= $m['nama_admin']; ?>"> Hapus</a>
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
<form action="modules/admin/proses.php" method="GET" class="d-inline">
  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data Admin?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" class="form-control" name="act" value="delete">
                <input type="hidden" class="form-control id_admin" name="id_admin">
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