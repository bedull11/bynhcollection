<?php

/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
// panggil fungsi untuk format tanggal
require_once "config/fungsi_tanggal.php";
/* panggil file untuk format nama hari */
require_once "config/fungsi_nama_hari.php";
// panggil fungsi untuk format rupiah
require_once "config/fungsi_rupiah.php";


// fungsi untuk pemanggilan file halaman konten
// jika halaman konten yang dipilih home, panggil file view home
if ($_GET['page'] == 'home') {
	include "pages/home/view.php";
}
// jika halaman konten yang dipilih produk terbaru, panggil file terbaru
if ($_GET['page'] == 'produk') {
	include "pages/produk/view.php";
}
if ($_GET['page'] == 'detail') {
	include "pages/produk/detail.php";
}
if ($_GET['page'] == 'login') {
	include "pages/login/view.php";
}
if ($_GET['page'] == 'daftar') {
	include "pages/daftar/view.php";
}
if ($_GET['page'] == 'proses_daftar') {
	include "pages/daftar/proses.php";
}


if ($_GET['page'] == 'keranjang') {
	include "pages/keranjang/view.php";
}
if ($_GET['page'] == 'review_pesanan') {
	include "pages/keranjang/review_pesanan.php";
}
if ($_GET['page'] == 'proses_pesanan') {
	include "pages/keranjang/proses.php";
}
if ($_GET['page'] == 'konfirmasi') {
	include "pages/pembayaran/konfirmasi.php";
}
if ($_GET['page'] == 'form_konfirmasi') {
	include "pages/pembayaran/form.php";
}
if ($_GET['page'] == 'proses_pembayaran') {
	include "pages/pembayaran/proses.php";
}
if ($_GET['page'] == 'pesanan') {
	include "pages/pembayaran/pesanan.php";
}
if ($_GET['page'] == 'detail_pesanan') {
	include "pages/pembayaran/detail_pesanan.php";
}
if ($_GET['page'] == 'ubah_profile') {
	include "pages/profile/view.php";
}
// if ($_GET['page'] == 'proses_profile') {
// 	include "pages/profile/proses.php";
// }