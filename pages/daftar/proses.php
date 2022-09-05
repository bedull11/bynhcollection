<?php 
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die;
// Panggil koneksi database.php untuk koneksi database
// require_once "../../config/database.php";

if (isset($_POST['daftar'])) {
        // cek konfirmasi password
        if ($_POST['password'] !== $_POST['password2']) {
            header("location: ../../main.php?page=daftar&alert=2");
            die;
        }
  //ambil data 
  $nama =  mysqli_real_escape_string($mysqli, trim($_POST['nama']));
  $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
  $telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
  $alamat = mysqli_real_escape_string($mysqli, trim($_POST['alamat']));
  $password = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
  $password2 =  md5(mysqli_real_escape_string($mysqli, trim($_POST['password2'])));


  	// perintah query untuk pengecekan email pada tabel konsumen
	$query_email = mysqli_query($mysqli, "SELECT email FROM pembeli WHERE email='$email'")
    or die('Ada kesalahan pada query cek email : '.mysqli_error($mysqli));    
    $row_email   = mysqli_num_rows($query_email);

    // jika data email sudah ada
    if ($row_email > 0) {
    // maka alihkan ke halaman form pendaftaran
    header("location: main.php?page=daftar&alert=1");
    }
    // jika data email belum ada
    else {
    // maka jalankan perintah query untuk menyimpan data ke tabel pesan
    $query = mysqli_query($mysqli, "INSERT INTO pembeli(nama,
                        email,
                        telepon,
                        alamat,
                        password)
                    VALUES('$nama',
                        '$email',
                        '$telepon',
                        '$alamat',
                        '$password')")	
    or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
    // cek query
    if ($query) {
    // jika berhasil tampilkan pesan berhasil simpan data
    header("location: main.php?page=login&alert=1");
    }	
    }





}
