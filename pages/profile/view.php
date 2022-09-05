<!-- Page Content -->
<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
$pembeli = query("SELECT * FROM pembeli WHERE id_pembeli='$_SESSION[id_pembeli]'")[0];

// echo "<pre>";
// var_dump($pembeli);
// echo "</pre>";
// die;
?>
    <div class="page-content page-auth mt-5 p-5" id="register" >
      <div class="section-store-auth">
        <div class="container">
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
            // 
            elseif ($_GET['alert'] == 1) {
                    echo "<div class='alert alert-success' role='alert'>
                    Berhasil melakukan perubahan akun
                  </div>";
            }
            elseif ($_GET['alert'] == 2) {
                    echo "<div class='alert alert-danger' role='alert'>
                    Password konfirmasi tidak sesuai
                  </div>";
            }
          ?>
          </div>
        </div>
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <form class="mt-3" method="POST" action="pages/profile/proses.php">
                <input type="hidden"class="form-control" aria-describedby="nameHelp" v-model="name"autofocus name="id_pembeli" value="<?= $pembeli['id_pembeli']; ?>" />
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text"class="form-control" aria-describedby="nameHelp" v-model="name"autofocus name="nama" value="<?= $pembeli['nama']; ?>" />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" aria-describedby="emailHelp" v-model="email" name="email" value="<?= $pembeli['email']; ?>" />
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="phone" class="form-control" aria-describedby="phoneHelp" v-model="phone" name="telepon" value="<?= $pembeli['telepon']; ?>" />
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?= $pembeli['alamat']; ?>" />
                </div>
                <div class="form-group">
                  <label>Ubah Password</label>
                  <input type="password" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" name="password2"/>
                </div>
                <button  type="submit" class="btn btn-success btn-block mt-4" name="ubah_profile" >
                  Ubah Profile
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- registsuccessModal -->   
    <div class="modal regist-succes-modal mt-5" id="registsuccessModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="img/berhasildaftar.png" class="mb-5">
            <h3>Selamat datang di Dimsum.In</h3>
            <p>Kamu sudah terdaftar , yuk cari dan pesan 
              makanan mu!</p>
            <div>
              <a href="" type="button" class="btn text-white btn-login btn-block mt-3">Sign In</a>
            </div>
          </div>
        </div>
      </div>
    </div>