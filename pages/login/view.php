<!-- Login -->
    <div class="page-content page-auth mt-5 p-5">
      <div class="section-store-auth" data-aos="fade-up">
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
            elseif ($_GET['alert'] == 1) {
                    echo "<div class='alert alert-success' role='alert'>
                    Registrasi berhasil
                  </div>";
            }
            // jika alert = 1
            elseif ($_GET['alert'] == 2) {
                    echo "<div class='alert alert-warning' role='alert'>
                    Login terlebih dahulu
                  </div>";
            }
          ?>
          </div>
        </div>
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img src="img/login.svg" alt="" class="w-50 mb-4 mb-lg-none"/>
            </div>
            <div class="col-lg-5 loginNi">
              <h2>
                Jadikan fashion mu, <span>menjadi lebih menarik</span>
              </h2>

              <form class="mt-3"  method="POST" action="login-check.php">
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email" required/>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required/>
                </div>

                <button class="btn btn-login btn-success text-white btn-block mt-4" type="submit" name="login">
                  Login
                </button>

                <a class="btn btn-signup btn-block mt-2" href="main.php?page=daftar">
                  Daftar
                </a>
                
                <div class="login-akun mt-3">
                  <span class="msg">Belum Memiliki Akun ?</span>
                  <a href="main.php?page=daftar" style="text-decoration: none;" class="link">daftar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
