<?php // fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
} ?>
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
        <div class="col-12">
          <form role="form" class="form-horizontal" method="POST" action="pages/pembayaran/proses.php" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" class="form-control" name="id_bayar" value="<?= $_GET['bayar']; ?>" required>
              <input type="hidden" class="form-control" name="id_transaksi"  value="<?= $_GET['transaksi']; ?>" required>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Tanggal Bayar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_bayar" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">No. Telepon</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_telepon" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah bayar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_pembayaran" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Bukti bayar</label>
                <div class="col-sm-3">
                  <img src="img/pembayaran/default.png" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-5">
                  <input type="file" class="" name="gambar" onchange="previewImg(this)">
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group row justify-content-end">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                </div>
              </div>
            </div><!-- /.box footer -->
            
          </form>
        </div>
      </div>

  </div>
</section>