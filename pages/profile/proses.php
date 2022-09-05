<?php 
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die;

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=?page=login&alert=2'>";
}
// Panggil koneksi database.php untuk koneksi database
require "../../config/database.php";
session_start();

if (isset($_POST['ubah_profile'])) {
        // cek konfirmasi password
        if ($_POST['password'] !== $_POST['password2']) {
            header("location: ../../main.php?page=ubah_profile&alert=2");
            die;
        }
    //ambil data 
    $id_pembeli =  mysqli_real_escape_string($mysqli, trim($_POST['id_pembeli']));
    $nama =  mysqli_real_escape_string($mysqli, trim($_POST['nama']));
    $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    $telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
    $alamat = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
    $password = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));

    // maka jalankan perintah query untuk menyimpan data ke tabel pesan
    $query = mysqli_query($mysqli, "UPDATE pembeli SET nama = '$nama',
    email = '$email',
    telepon = '$telepon',
    alamat = '$alamat',
    password = '$password' WHERE id_pembeli = $id_pembeli")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

    // cek query
    if ($query) {
    // jika berhasil tampilkan pesan berhasil simpan data
    header("location: ../../main.php?page=ubah_profile&alert=1");
    }	
}

