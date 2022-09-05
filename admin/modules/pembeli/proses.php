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
        $id_pembeli =  mysqli_real_escape_string($mysqli, trim($_POST['id_pembeli']));
        $nama =  mysqli_real_escape_string($mysqli, trim($_POST['nama']));
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
        $telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
        $alamat = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));

        // maka jalankan perintah query untuk menyimpan data ke tabel pesan
        $query = mysqli_query($mysqli, "UPDATE pembeli SET nama = '$nama',
                                        email = '$email',
                                        telepon = '$telepon',
                                        alamat = '$alamat' WHERE id_pembeli = $id_pembeli")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=pembeli&alert=1");
        }   
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_pembeli'])) {
            $id_pembeli =  mysqli_real_escape_string($mysqli, trim($_GET['id_pembeli']));
            // perintah query untuk menghapus data pada tabel dimsum
            $query = mysqli_query($mysqli, "DELETE FROM pembeli WHERE id_pembeli = $id_pembeli")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pembeli&alert=2");
            }
        }
    }
}
