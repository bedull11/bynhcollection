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
    if ($_GET['act'] == 'edit') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // die;

        //ambil data 
        $id_transaksi =  mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
        $nama =  mysqli_real_escape_string($mysqli, trim($_POST['nama']));
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
        $alamat = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
        $kota = mysqli_real_escape_string($mysqli, trim($_POST['kota']));
        $telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
        $total = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['total'])));

        // maka jalankan perintah query untuk menyimpan data ke tabel pesan
        $query = mysqli_query($mysqli, "UPDATE transaksi SET nama = '$nama',
                                        email = '$email',
                                        alamat = '$alamat',
                                        telepon = '$telepon',
                                        kota = '$kota',
                                        total = '$total' WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=transaksi&alert=1");
        }   
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_transaksi'])) {
            $id_transaksi =  mysqli_real_escape_string($mysqli, trim($_GET['id_transaksi']));
            // perintah query untuk menghapus data pada tabel dimsum
            $query = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
            $query = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id_transaksi = $id_transaksi")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
            $query = mysqli_query($mysqli, "DELETE FROM pembayaran WHERE id_transaksi = $id_transaksi")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=transaksi&alert=2");
            }
        }
    }
}
