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
          <form role="form" class="form-horizontal" method="POST" action="modules/admin/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Admin</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_admin" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="password" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-2">
                  <img src="../img/admin/default.png" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                  <input type="file" class="" name="gambar" onchange="previewImg(this)">
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=admin" class="btn btn-default btn-reset">Batal</a>
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
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form'] == 'edit') {
  if (isset($_GET['id_admin'])) {
    // fungsi query untuk menampilkan data dari tabel galeri
    $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_GET[id_admin]'")
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
          <form role="form" class="form-horizontal" method="POST" action="modules/admin/proses.php?act=edit" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_admin" value="<?= $data['id_admin']; ?>">
              <input type="hidden" name="gambar_lama" value="<?= $data['foto']; ?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Admin</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_admin" value="<?= $data['nama_admin']; ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" autocomplete="off" required>
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="password" autocomplete="off">
                </div>
              </div> -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-2">
                  <img src="../img/admin/<?= $data['foto']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                  <input type="file" class="" name="gambar" onchange="previewImg(this)">
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=admin" class="btn btn-default btn-reset">Batal</a>
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