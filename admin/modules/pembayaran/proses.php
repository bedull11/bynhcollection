<?php

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
session_start();

// fungsi untuk pengecekan status login user 
//jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "oy";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'terima') {
        // echo '<pre>';
        // var_dump($_GET);
        // echo '</pre>';
        // die;
        $id_transaksi      = mysqli_real_escape_string($mysqli, trim($_GET['id']));
        $status_bayar      = "Pembayaran Diterima";

        // maka jalankan perintah query untuk menyimpan data ke tabel pesan
        $query = mysqli_query($mysqli, "UPDATE pembayaran SET status_bayar = '$status_bayar' WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
        $query = mysqli_query($mysqli, "UPDATE transaksi SET status = '$status_bayar' WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=pembayaran&alert=1");
        }
    } elseif ($_GET['act'] == 'tolak') {
        $id_transaksi      = mysqli_real_escape_string($mysqli, trim($_GET['id']));
        $status_bayar      = "Pembayaran Ditolak";

        // maka jalankan perintah query untuk menyimpan data ke tabel pesan
        $query = mysqli_query($mysqli, "UPDATE pembayaran SET status_bayar = '$status_bayar' WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
        $query = mysqli_query($mysqli, "UPDATE transaksi SET status = '$status_bayar' WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=pembayaran&alert=2");
        }
    } 
}
