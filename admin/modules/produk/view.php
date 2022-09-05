<?php
$produk = query("SELECT * FROM dimsum");

// echo "<pre>";
// var_dump($menu);
// echo "</pre>";
// die;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Produk</h1>
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
                    Produk berhasil disimpan
                </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success' role='alert'>
                    Produk berhasil diubah
                </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success' role='alert'>
                    Produk berhasil dihapus
                </div>";
        }
        ?>
    </div>
</div>
<!-- DataTales Example float-right mb-3-->
<div class="card shadow mb-4">
    <div class="card-body">
        <a class="btn btn-primary mb-3 " href="?module=form_produk&form=add" <button class="btn"><i class="fas fa-plus-square"></i> Tambah Data Produk</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($produk as $p) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $p['nama_dimsum']; ?></td>
                            <td><?= $p['stok']; ?></td>
                            <td>IDR <?= number_format($p['harga'], 0, 0, '.'); ?></td>
                            <td>
                                <img src="../img/produk/<?= $p['gambar']; ?>" class="figure-img img-fluid rounded">
                            </td>
                            <td><?= $p['deskripsi']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="?module=form_produk&form=edit&id_dimsum=<?= $p['id_dimsum']; ?>">Edit</a>
                                <a class="btn btn-danger btn-hapusMenu" href="#" data-toggle="modal" data-id="<?= $p['id_dimsum']; ?>"  data-nama="<?= $p['nama_dimsum']; ?>">Hapus</a>
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
<form action="modules/produk/proses.php" method="GET" class="d-inline">
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Produk?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="act" value="delete">
                    <input type="hidden" class="form-control id_dimsum" name="id_dimsum">
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