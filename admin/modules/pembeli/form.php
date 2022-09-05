<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form'] == 'add') { ?>
<?php
}
elseif ($_GET['form'] == 'edit') {
  if (isset($_GET['id_pembeli'])) {
    // fungsi query untuk menampilkan data dari tabel galeri
    $query = mysqli_query($mysqli, "SELECT * FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'")
      or die('Ada kesalahan pada query tampil data galeri : ' . mysqli_error($mysqli));
    $data  = mysqli_fetch_assoc($query);

//     echo "<pre>";
// var_dump($data);
// echo "</pre>";
// die;
  }
?>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/pembeli/proses.php?act=edit" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pembeli</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="id_pembeli" value="<?= $data['id_pembeli']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="email" value="<?= $data['email']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="telepon" value="<?= $data['telepon']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="alamat" value="<?= $data['alamat']; ?>" autocomplete="off" required>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div>
      <!--/.col -->
    </div> <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>


<script>
  function previewImg(input) {
    //  const gambarLabel = input.nextElementSibling;
    const imgPreview = input.parentElement.previousElementSibling.firstElementChild;
    // console.log(gambar);
    //  gambarLabel.textContent = input.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(input.files[0]);


    fileGambar.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
</script>