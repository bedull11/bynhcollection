<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['id_admin']) && empty($_SESSION['username']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}
	if ($_GET['module'] == 'produk') {
		include "modules/produk/view.php";
	}
	if ($_GET['module'] == 'form_produk') {
		include "modules/produk/form.php";
	}
	if ($_GET['module'] == 'admin') {
		include "modules/admin/view.php";
	}
	if ($_GET['module'] == 'form_admin') {
		include "modules/admin/form.php";
	}
	if ($_GET['module'] == 'pembayaran') {
		include "modules/pembayaran/view.php";
	}
	if ($_GET['module'] == 'transaksi') {
		include "modules/transaksi/view.php";
	}
	if ($_GET['module'] == 'form_transaksi') {
		include "modules/transaksi/form.php";
	}
	if ($_GET['module'] == 'pembeli') {
		include "modules/pembeli/view.php";
	}
	if ($_GET['module'] == 'form_pembeli') {
		include "modules/pembeli/form.php";
	}
	// ---------------------------------------------------------------------------------

}
