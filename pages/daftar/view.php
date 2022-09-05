<!-- Page Content -->
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
                      echo "<div class='alert alert-warning' role='alert'>
                      Email sudah terdaftar
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
            <div class="col-lg-5 col-sm-12">
              <h3 class="judul text-center">
                Registrasi <span> By.NH Collection </span>
              </h3>

              <form class="mt-3" method="POST" action="main.php?page=proses_daftar">
                <div class="form-group">
                  <label>Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    aria-describedby="nameHelp"
                    autofocus
                    placeholder="Nama Lengkap"
                    name="nama"
                    required
                  />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input
                    type="email"
                    class="form-control"
                    aria-describedby="emailHelp"
                    placeholder="Email"
                    name="email"
                    required
                  />
                  <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan Email anda kepada siapa pun.</small>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input
                    type="number"
                    class="form-control"
                    aria-describedby="phoneHelp"
                    placeholder="Nomor Telephon"
                    name="telepon"
                    required
                  />
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input
                    type="text"
                    class="form-control"
                    name="alamat"
                    placeholder="Alamat Lengkap"
                    required
                  />
                  <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan Alamat anda kepada siapa pun.</small>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" 
                    placeholder="Password" class="form-control" name="password" required/>
                </div>
                <div class="form-group">
                  <label>Repeat Password</label>
                  <input type="password" class="form-control" 
                    placeholder="Ulangi Password" name="password2" required/>
                </div>
                <button  type="submit" class="btn btn-success btn-block mt-4" name="daftar" >
                  Daftar
                </button>

                <a href="main.php?page=login" type="submit" class="btn btn-signup btn-block mt-2">
                  Login
                </a>

                <div class="login-akun mt-3">
                  <span class="msg">Sudah Memiliki Akun ?</span>
                  <a href="main.php?page=login" style="text-decoration: none;" class="link">Masuk</a>
                </div>

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