<?php
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
$total = 0;
$total2 = 0;

$id_pembeli = $_SESSION['id_pembeli'];
// $nama = $_SESSION['nama'];
// $email = $_SESSION['email'];
// $_SESSION['telepon'];
// $_SESSION['alamat'];

$pembeli = query("SELECT * FROM pembeli WHERE id_pembeli = '$id_pembeli'")[0];
// echo "<pre>";
// var_dump(isset($_SESSION['cart']));
// echo "</pre>";
// die;
?>
<!-- Breadcrumbs -->
<section class="store-breadcrumbs">
  <div class="container mt-5 mt-n4">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent pl-0">
            <li class="breadcrumb-item"><a href="main.php?page=produk" style="text-decoration: none">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Details Produk
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>


<!-- Checkout -->
<section class="checkout" style="min-height:600px">
  <div class="container">
    <div class="row justify-content-between" style="margin-bottom: 100px;">
      <div class="col-lg-6">
        <h4 class="mb-4">Keranjang</h4>
        <?php if (isset($_SESSION['cart'])) { ?>
        
          <?php foreach ($_SESSION['cart'] as $id_dimsum => $jumlah) {
            $items = query("SELECT * FROM dimsum WHERE id_dimsum = $id_dimsum")[0];

            $subharga = $items['harga'] * $jumlah;
            $total += $subharga;
          ?>
            <div class="row mb-4">
              <div class="col-2">
                <img src="img/produk/<?= $items['gambar']; ?>" style="width: 80px; height: 50px">
              </div>
              <div class="col-4">
                <h5 class="m-0"><?= $items['nama_dimsum']; ?></h5>
                <p class="m-0" style="color:#B7B7B7;">Rp <?= number_format($items['harga'], 0, 0, '.'); ?></p>
              </div>
              <div class="col-4">
                <div class="btn btn-sm btn-group quantity ml-n2">
                  <a href="cart.php?act=minus&id_dimsum=<?= $id_dimsum; ?>" class="btn btn-sm minus mr-1" style="background-color: #EAEAEF; color: white;" value="-" data-id="<?= $id_dimsum; ?>"><i class="fas fa-minus-circle"></i></a>

                  <input type="text" id="quantity" name="jumlah[]" value="<?= $jumlah; ?>" class="qty text-center" style="width:32px">
                  
                  <a href="cart.php?act=plus&id_dimsum=<?= $id_dimsum; ?>" class="btn btn-sm btn-success plus ml-1" value="+"><i class="fas fa-plus-circle"></i></a>
                </div>
              </div>
              <div class="col-2 text-right">
                <a href="cart.php?act=del&id_dimsum=<?= $id_dimsum; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?');" style="color: white;"><i class="fa fa-trash"></i></a>
              </div>
            </div>
          <?php } ?>
          
          <h4 class="mb-3" style="margin-top: 100px;">Alamat Lengkap</h4>

          <form method="POST" action="main.php?page=review_pesanan">
            <input type="hidden" class="form-control" value="<?= isset($pembeli['id_pembeli']) ? $pembeli['id_pembeli'] : ''; ?>" name="id_pembeli" required />
            <input type="hidden" class="form-control" value="<?= $total ?>" name="total" required />
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" value="<?= isset($pembeli['nama']) ? $pembeli['nama'] : ''; ?>" autofocus name="nama" required />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" value="<?= isset($pembeli['email']) ? $pembeli['email'] : ''; ?>" name="email" required />
            </div>
            <div class="form-group">
              <label>Nomor Telephone</label>
              <input type="phone" class="form-control" value="<?= isset($pembeli['telepon']) ? $pembeli['telepon'] :  ''; ?>" name="telepon" required />
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" value="<?= isset($pembeli['alamat']) ? $pembeli['alamat'] : ''; ?>" name="alamat" required />
            </div>

            <?php
              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "key: 1748ebf11897cb63b8f3ad52264402fa"
                ),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);
              $data_provinsi = json_decode($response, true);
            ?>

              <div class="form-group">
                <label>Provinsi</label>
                <select name='provinsi' id='provinsi' class="input form-control kota" required>
                  <option>Pilih Provinsi Tujuan</option>
                  <?php
                  for ($i = 0; $i < count($data_provinsi['rajaongkir']['results']); $i++) {
                    echo "<option value='" . $data_provinsi['rajaongkir']['results'][$i]['province_id'] . "'>" . $data_provinsi['rajaongkir']['results'][$i]['province'] . "</option>";
                  }
                  ?>
                </select>
              </div>

            <div class="form-group">
              <label>Kota / Kabupaten</label>
              <select id="kabupaten" name="kabupaten" class="input form-control kota" required>
                <option>Pilih Kota / Kabupaten Tujuan</option>
              </select>
            </div>

            <input name="kurir" id="kurir" value="" required="required" type="hidden">
            <input name="ongkir2" id="ongkir2" value="" required="required" type="hidden">
            <input name="service" id="service" value="" required="required" type="hidden">
            <input name="provinsi2" id="provinsi2" value="" required="required" type="hidden">
            <input name="kabupaten2" id="kabupaten2" value="" required="required" type="hidden">
            <div id="ongkir"></div>

            <div class="row mt-3">
              <div class="col">
                <button type="submit" class="btn btn-success btn-block text-white" name="checkout" data-toggle="modal" data-target="#keranjangModal">Pembayaran</button>
              </div>
            </div>
          </form>

          <small class="text-danger">*wajib memilih kurir, pesanan akan tertolak jika tidak memilih</small>

        <?php } else { ?>
          <div class="row text-center">
            <div class="col">
              <p>Keranjang belanja anda sedang kosong</p>
            </div>
          </div>
        <?php } ?>

      </div>

      <div class="col-lg-5">
        <div class="card rounded-0 checkout-detail">
          <div class="card-body">
            <h5 class="card-title">Informasi Biaya</h5>
            <?php if (isset($_SESSION['cart'])) { ?>
              <?php foreach ($_SESSION['cart'] as $id_dimsum => $jumlah) {
                $items = query("SELECT * FROM dimsum WHERE id_dimsum = $id_dimsum")[0];

                $subharga2 = $items['harga'] * $jumlah;
                $total2 += $subharga2;
              ?>
                <div class="row mb-3">
                  <div class="col">
                    <h6 class="m-0"><?= $items['nama_dimsum']; ?></h6>
                    <small style="color: #B7B7B7;"><?= $jumlah; ?> Items</small>
                  </div>
                  <div class="col d-flex justify-content-end">
                    <h6 class="m-0 align-self-center text-success">Rp <?= number_format($subharga2, 0, 0, '.'); ?></h6>
                  </div>
                </div>
              <?php   } ?>
            <?php } ?>

            <hr>

            <div class="row mb-3">
              <div class="col">
                <h6 class="m-0">Kurir</h6>
              </div>
              <div class="col d-flex justify-content-end">
                <h6 class="m-0 align-self-center text-warning">Belum termasuk Kurir</h6>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <h6 class="m-0">Total Harga</h6>
              </div>
              <div class="col d-flex justify-content-end">
                <h6 class="m-0 align-self-center text-primary">Rp <?= number_format($total, 0, 0, '.'); ?></h6>
              </div>
            </div>


          </div>
        </div>
        <div class="container">
          <div class="row mt-5">
            <h5 class="card-title">Informasi Pembayaran</h5>
            <table class="table">
              <thead>
                  <tr> 
                  <th scope="col">Pembayaran</th>
                  <th scope="col">Nomor Rekening</th>
                  <th scope="col">Atas Nama</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <th scope="row">BRI</th>
                    <td>7955-0100-5134-539</td>
                    <td>Nurul Auliya</td>
                  </tr>
                  <tr>
                    <th scope="row">OVO</th>
                    <td>089515664807</td>
                    <td>Nurul Auliya</td>
                  </tr>
                  <tr>
                    <th scope="row">DANA</th>
                    <td>089515664807</td>
                    <td>Nurul Auliya</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

  $('#provinsi').change(function(){
	var prov = $('#provinsi').val();
			var provinsi = $("#provinsi :selected").text();
			$.ajax({
				type : 'GET',
				url : 'rajaongkir/cek_kabupaten.php',
				data :  'prov_id=' + prov,
				success: function (data) {
					$("#kabupaten").html(data);
					$("#provinsi2").val(provinsi);
				}
			});
		});

		$(document).on("change","#kabupaten",function(){

			var asal = 456;
			var kab = $('#kabupaten').val();
			var kurir = "a";
			var berat = $('#berat2').val();

			var kabupaten = $("#kabupaten :selected").text();

			$.ajax({
				type : 'POST',
				url : 'rajaongkir/cek_ongkir.php',
				data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
				success: function (data) {
					$("#ongkir").html(data);
					// alert(data);

					// $("#provinsi").val(prov);
					$("#kabupaten2").val(kabupaten);

				}
			});
		});

		function format_angka(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		$(document).on("change", '.pilih-kurir', function(event) { 
			// alert("new link clicked!");
			var kurir = $(this).attr("kurir");
			var service = $(this).attr("service");
			var ongkir = $(this).attr("harga");
			var total_bayar = $("#total_bayar").val();

			$("#kurir").val(kurir);
			$("#service").val(service);
			$("#ongkir2").val(ongkir);
			var total = parseInt(total_bayar) + parseInt(ongkir);
			$("#tampil_ongkir").text("Rp "+ format_angka(ongkir) +" ,-");
			$("#tampil_total").text("Rp "+ format_angka(total) +" ,-");
		});

</script>

</section>
<!-- Akhir Checkout -->