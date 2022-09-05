<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form'] == 'add') { ?>
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- <h3>
       <i style="margin-right:7px" class="fa fa-edit"></i> Input Data Galeri
     </h3>
     <ol class="breadcrumb">
       <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
       <li><a href="?module=galeri"> galeri </a></li>
       <li class="active"> Tambah </li>
     </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/produk/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_dimsum" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Stok</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="stok" name="stok" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-2">
                  <img src="../img/produk/default.png" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                  <input type="file" class="" name="gambar" onchange="previewImg(this)">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi Produk"></textarea>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div>
      <!--/.col -->
    </div> <!-- /.row -->

    <div class="row">
    </div>
  </section><!-- /.content -->

  <script>
    $.validate({
      modules : 'location, date, security, file'
    });
  </script>



<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form'] == 'edit') {
  if (isset($_GET['id_dimsum'])) {
    // fungsi query untuk menampilkan data dari tabel galeri
    $query = mysqli_query($mysqli, "SELECT * FROM dimsum WHERE id_dimsum='$_GET[id_dimsum]'")
      or die('Ada kesalahan pada query tampil data galeri : ' . mysqli_error($mysqli));
    $data  = mysqli_fetch_assoc($query);
  }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
     <h1>
       <i style="margin-right:7px" class="fa fa-edit"></i> Ubah Data Galeri
     </h1>
     <ol class="breadcrumb">
       <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
       <li><a href="?module=galeri"> Galeri </a></li>
       <li class="active"> Ubah </li>
     </ol>
   </section> -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/produk/proses.php?act=edit" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_dimsum" value="<?php echo $data['id_dimsum']; ?>">
              <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_dimsum" value="<?= $data['nama_dimsum']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Stok Produk</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="stok" value="<?= $data['stok']; ?>" name="stok" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Produk</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-2">
                  <img src="../img/produk/<?= $data['gambar']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                  <input type="file" class="" name="gambar" onchange="previewImg(this)">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan Deskripsi Produk"><?= $data['deskripsi']; ?></textarea>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=produk" class="btn btn-default btn-reset">Batal</a>
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