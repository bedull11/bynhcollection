<?php
// Panggil koneksi database.php untuk koneksi database
require "../../config/database.php";
session_start();
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}


// echo "<pre>";
// var_dump($_SESSION['cart']);
// echo "</pre>";
// die;

if (isset($_POST)) {
//   echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die;
  //ambil data 
  $id_pembeli =  mysqli_real_escape_string($mysqli, trim($_POST['id_pembeli']));
  $nama =  mysqli_real_escape_string($mysqli, trim($_POST['nama']));
  $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
  $alamat = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
  $kurir = mysqli_real_escape_string($mysqli, trim($_POST['kurir']));
  $ongkir = mysqli_real_escape_string($mysqli, trim($_POST['ongkir']));
  $provinsi = mysqli_real_escape_string($mysqli, trim($_POST['provinsi']));
  $kota = mysqli_real_escape_string($mysqli, trim($_POST['kota']));
  $telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
  $total = mysqli_real_escape_string($mysqli, trim($_POST['total']));
  $status = "Menunggu Pembayaran";
  $tanggal_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_transaksi']));

  // maka jalankan perintah query untuk menyimpan data ke tabel pesan
  $query = mysqli_query($mysqli, "INSERT INTO transaksi(id_pembeli,
                        nama,
                        email,
                        alamat,
                        kurir,
                        ongkir,
                        provinsi,
                        kota,
                        telepon,
                        total,
                        status,
                        tanggal_transaksi)
                    VALUES('$id_pembeli',
                        '$nama',
                        '$email',
                        '$alamat',
                        '$kurir',
                        '$ongkir',
                        '$provinsi',
                        '$kota',
                        '$telepon',
                        '$total',
                        '$status',
                        '$tanggal_transaksi')")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

  $id_transaksi = mysqli_insert_id($mysqli);
  foreach ($_SESSION['cart'] as $id_dimsum => $jumlah) {
    $query = mysqli_query($mysqli, "INSERT INTO penjualan(id_transaksi, id_dimsum, jumlah) VALUES('$id_transaksi', '$id_dimsum','$jumlah')");
  }

  $query = mysqli_query($mysqli, "INSERT INTO pembayaran(id_transaksi,
                        status_bayar,
                        tanggal_bayar)
                      VALUES('$id_transaksi',
                        '$status',
                        '$tanggal_transaksi')")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

  unset($_SESSION['cart']);

  // //Masukan pesanan ke keranjang
  // echo "<pre>";
  // var_dump($_SESSION['cart']);
  // echo "</pre>";
  // die;
  // cek query
  if ($query) {
    // jika berhasil tampilkan pesan berhasil simpan data
    header("location: ../../main.php?page=pesanan&alert=1");
  }
}
